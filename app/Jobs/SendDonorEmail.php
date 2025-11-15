<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonorEmails;
use App\Models\DonorEmail;
use App\Models\EmailTemplate;
use App\Models\Donor;
use App\Models\EmailAttachment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SendDonorEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $donorEmail;
    protected $subject;
    protected $body;
    protected $donorId;
    protected $templateId;
    protected $userId;

    public function __construct($donorEmail, $subject, $body, $donorId, $templateId, $userId)
    {
        $this->donorEmail = $donorEmail;
        $this->subject = $subject;
        $this->body = $body;
        $this->donorId = $donorId;
        $this->templateId = $templateId;
        $this->userId = $userId;
    }

    public function handle(): void
    {
        DB::beginTransaction();
        
        try {
            Log::info("Job started for donor {$this->donorId}", [
                'email' => $this->donorEmail,
                'template_id' => $this->templateId
            ]);

            // Get template with attachments
            $template = EmailTemplate::with('attachments')->find($this->templateId);
            
            // Get donor with attachments
            $donor = Donor::find($this->donorId);
            
            if (!$template || !$donor) {
                throw new \Exception("Template or donor not found");
            }
            $templateAttachments = $template->attachments->pluck('file_path')->map(function ($path) {
                return $this->resolveAttachmentPath($path);
            })->filter()->toArray();

          
            $donorAttachments = [];
            if (isset($donor->attachments) && is_array($donor->attachments)) {
                if (isset($donor->attachments['file_path'])) {
                    $donorAttachments = is_array($donor->attachments['file_path'])
                        ? $donor->attachments['file_path']
                        : [$donor->attachments['file_path']];
                    
                    $donorAttachments = array_map(function ($path) {
                        return $this->resolveAttachmentPath($path);
                    }, $donorAttachments);
                    $donorAttachments = array_filter($donorAttachments);
                }
            }

            $allAttachments = array_merge($templateAttachments, $donorAttachments);
            $allAttachments = array_unique(array_filter($allAttachments));

          

            $validAttachments = [];
            
            foreach ($allAttachments as $relativePath) {
                $absolutePath = public_path($relativePath);
                
             
                if (file_exists($absolutePath) && is_readable($absolutePath)) {
                    $validAttachments[] = $absolutePath;
                  
                } else {
                    
                }
            }

           

            // Send email
            $mail = new DonorEmails(
                $this->subject,
                $this->body,
                $validAttachments
            );

            Mail::to($this->donorEmail)->send($mail);

          
            $emailRecord = DonorEmail::where('donor_id', $this->donorId)
                ->where('template_id', $this->templateId)
                ->where('status', 'queued')
                ->orderBy('id', 'desc')
                ->first();

            if ($emailRecord) {
                $emailRecord->update([
                    'status' => 'sent',
                    'sent_at' => now(),
                    'attachment_paths' => !empty($allAttachments) ? json_encode($allAttachments) : null,
                ]);
                Log::info("Email marked as sent for donor {$this->donorId}");
            }

            DB::commit();
            Log::info("Email sent successfully to donor {$this->donorId}");

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Email job failed for donor {$this->donorId}: " . $e->getMessage());
            
            $emailRecord = DonorEmail::where('donor_id', $this->donorId)
                ->where('template_id', $this->templateId)
                ->where('status', 'queued')
                ->orderBy('id', 'desc')
                ->first();

            if ($emailRecord) {
                $emailRecord->update([
                    'status' => 'failed',
                    'error_message' => $e->getMessage(),
                ]);
            }

            throw $e;
        }
    }

    /**
     * Resolve attachment path to relative public path
     */
    private function resolveAttachmentPath($path)
    {
        if (empty($path)) {
            return null;
        }

        // Remove storage paths if present
        $path = str_replace(storage_path('app/public/'), '', $path);
        $path = str_replace(public_path(), '', $path);
        
        // Remove leading slashes
        $path = ltrim($path, '/\\');
        
        return $path;
    }

    public function failed(\Throwable $exception): void
    {
        Log::error("Email job failed completely for donor {$this->donorId}: " . $exception->getMessage());
        
        $emailRecord = DonorEmail::where('donor_id', $this->donorId)
            ->where('template_id', $this->templateId)
            ->where('status', 'queued')
            ->orderBy('id', 'desc')
            ->first();

        if ($emailRecord) {
            $emailRecord->update([
                'status' => 'failed',
                'error_message' => $exception->getMessage(),
            ]);
        }
    }
}