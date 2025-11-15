<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Models\Donor;
use App\Models\EmailHistory;
use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendGeneralEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $modelClass;

    protected $modelId;

    protected $templateId;

    protected $userId;

    protected $attachments;

    public function __construct($modelClass, $modelId, $templateId, $userId, array $attachments = [])
    {
        $this->modelClass = $modelClass;
        $this->modelId = $modelId;
        $this->templateId = $templateId;
        $this->userId = $userId;
        $this->attachments = $attachments;
    }

    public function handle(): void
    {
        try {
            // Fetch model
            $model = $this->modelClass::find($this->modelId);
            if (! $model) {
                Log::warning("Model not found: {$this->modelClass} ID {$this->modelId}");

                return;
            }
            // Fetch email template
            $template = EmailTemplate::with('attachments')->find($this->templateId);
            if (! $template) {
                Log::warning("Template not found: ID {$this->templateId}");

                return;
            }
            // Replace placeholders
            $body = $this->replaceVariables($template->body, $model);
            $subject = $this->replaceVariables($template->subject, $model);
            $toEmail = $model->email ?? ($model->donor->email ?? null);
            $toName = $model->name ?? ($model->donor->name ?? '');
            if (! $toEmail) {
                Log::warning("No email found for model ID {$this->modelId}");

                return;
            }
            $payload = [
                'sender' => [
                    'name' => env('BREVO_FROM_NAME', config('app.name')),
                    'email' => env('BREVO_FROM_ADDRESS', 'noreply@example.com'),
                ],
                'to' => [[
                    'email' => $toEmail,
                    'name' => $toName ?? $toEmail,
                ]],
                'subject' => $subject,
                'htmlContent' => $body,
            ];

            if (! empty($this->attachments)) {
                $payload['attachment'] = [];
                foreach ($this->attachments as $file) {
                    $path = public_path($file['file_path']);

                    if (file_exists($path)) {
                        // Detect MIME type and file extension
                        $mime = mime_content_type($path);
                        $extension = pathinfo($path, PATHINFO_EXTENSION);

                        // If file name has no extension, auto-add one
                        $fileName = $file['file_name'];
                        if (empty($extension)) {
                            $extension = explode('/', $mime)[1] ?? 'txt';
                            $fileName .= '.'.$extension;
                        } elseif (! str_ends_with($fileName, '.'.$extension)) {
                            $fileName .= '.'.$extension;
                        }

                        // ✅ Check if extension is supported by Brevo
                        $allowed = ['pdf', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'jpg', 'jpeg', 'png', 'gif', 'zip', 'csv', 'rtf', 'ics'];
                        if (! in_array(strtolower($extension), $allowed)) {
                            Log::warning("Skipping unsupported attachment: {$fileName}");

                            continue; // skip this file
                        }

                        // Add to payload
                        $payload['attachment'][] = [
                            'name' => $fileName,
                            'content' => base64_encode(file_get_contents($path)),
                        ];
                    } else {
                        Log::warning("Attachment file missing: {$path}");
                    }
                }
            }

            // ✅ Send via Brevo API
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'api-key' => env('BREVO_API_KEY'),
                'content-type' => 'application/json',
            ])->post('https://api.brevo.com/v3/smtp/email', $payload);

            Log::info('Brevo response', ['response' => $response->json()]);

            // ✅ Record in EmailHistory
            EmailHistory::create([
                'emailable_id' => $model->id,
                'emailable_type' => get_class($model),
                'template_id' => $template->id,
                'subject' => $subject,
                'body' => $body,
                'attachments' => json_encode($this->attachments),
                'status' => $response->successful() ? 'sent' : 'failed',
                'sent_at' => now(),
                'sent_by' => $this->userId,
            ]);

        } catch (\Throwable $e) {
            // Log failure
            Log::error('Email sending failed', ['error' => $e->getMessage()]);
            EmailHistory::create([
                'emailable_id' => $this->modelId,
                'emailable_type' => $this->modelClass,
                'template_id' => $this->templateId,
                'subject' => $template->subject ?? '',
                'body' => $template->body ?? '',
                'attachments' => json_encode($this->attachments),
                'status' => 'failed',
                'sent_by' => $this->userId,
            ]);
        }
    }

    private function replaceVariables($text, $model): string
    {
        $replacements = [
            '{{ year }}' => now()->year,
            '{{ organization_name }}' => config('app.name', 'Your Organization'),
        ];

        if ($model instanceof Donor) {
            $replacements += [
                '{{donor_name}}' => $model->name ?? '',
                '{{donor_email}}' => $model->email ?? '',
                '{{donor_phone}}' => $model->phone ?? '',
                '{{donor_city}}' => $model->city->name ?? '',
                '{{donor_whatsapp}}' => $model->whatsapp_no ?? '',
            ];
        } elseif ($model instanceof Booking) {
            $replacements += [
                '{{event_name}}' => optional($model->event)->title ?? '',
                '{{booking_person_name}}' => $model->name ?? '',
                '{{booking_person_email}}' => $model->email ?? '',
            ];
        }

        foreach ($replacements as $key => $value) {
            $text = str_replace([$key, str_replace(['{{ ', ' }}'], ['{{', '}}'], $key)], $value, $text);
        }

        return $text;
    }
}
