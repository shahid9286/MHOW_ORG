<?php

namespace App\Services;

use App\Models\EmailHistory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GeneralEmailService
{
    public function sendEmail($model, $template, $userId = null, $attachments = [])
    {
        try {
            // Log::info('Original template body:', ['body' => $template->body]);

            $subject = $this->replaceVariables($template->subject, $model);

            $body = $this->replaceVariables($template->body, $model);
            // Log::info('Replaced email body:', ['body' => $body]);
            $emailHistory = EmailHistory::create([
                'emailable_id' => $model->id,
                'emailable_type' => get_class($model),
                'template_id' => $template->id,
                'subject' => $subject,
                'body' => $body,
                'status' => 'queued',
                'sent_by' => $userId,
            ]);

            Mail::send([], [], function ($message) use ($model, $subject, $body, $attachments) {
                $message->to($model->email ?? '')
                    ->subject($subject)
                    ->html($body);

                foreach ($attachments as $file) {
                    // If your DB has `file_path` (like assets/uploads/...)
                    if (!empty($file['file_path'])) {
                        $path = public_path($file['file_path']); // direct DB path
                        if (file_exists($path)) {
                            $message->attach($path);
                            Log::info("📎 Attached file: " . $path);
                        } else {
                            Log::warning("⚠️ Attachment file not found: " . $path);
                        }
                    }
                }
            });
            $emailHistory->update([
                'status' => 'sent',
                'sent_at' => now(),
            ]);

            Log::info("✅ Email sent successfully to {$model->email}");
        } catch (\Throwable $e) {
            Log::error('❌ Email sending failed: '.$e->getMessage());

            EmailHistory::create([
                'emailable_id' => $model->id ?? null,
                'emailable_type' => get_class($model),
                'template_id' => $template->id ?? null,
                'subject' => $template->subject ?? '',
                'body' => $template->body ?? '',
                'status' => 'failed',
                'sent_by' => $userId,
            ]);
        }
    }

    private function replaceVariables($text, $model)
    {
        $replacements = [
            '{{ year }}' => now()->year,
            '{{ organization_name }}' => config('app.name', 'Your Organization'),
        ];

        if ($model instanceof \App\Models\Donor) {
            $replacements += [
                '{{donor_name}}' => $model->name ?? '',
                '{{donor_email}}' => $model->email ?? '',
                '{{donor_phone}}' => $model->phone ?? '',
                '{{donor_city}}' => $model->city->name ?? '',
                '{{donor_whatsapp}}' => $model->whatsapp_no ?? '',
            ];
        } elseif ($model instanceof \App\Models\Booking) {
            $replacements += [
                '{{event_name}}' => optional($model->event)->title ?? '',
                '{{booking_person_name}}' => $model->name ?? '',
                '{{booking_person_email}}' => $model->email ?? '',
            ];
        }

        foreach ($replacements as $key => $value) {
            $text = str_replace($key, $value, $text);
        }

        return $text;
    }
}
