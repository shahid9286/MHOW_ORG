<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Log;

class DonorEmails extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $attachmentPaths;

    public function __construct(string $subject, string $body, array $attachmentPaths = [])
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->attachmentPaths = $attachmentPaths;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            htmlString: $this->body,
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        Log::info("Mailable: Processing attachments", [
            'count' => count($this->attachmentPaths),
            'paths' => $this->attachmentPaths
        ]);

        foreach ($this->attachmentPaths as $absolutePath) {
            Log::info("Mailable: Checking attachment", [
                'absolute_path' => $absolutePath,
                'exists' => file_exists($absolutePath),
                'readable' => is_readable($absolutePath)
            ]);

            if (file_exists($absolutePath) && is_readable($absolutePath)) {
                $fileName = basename($absolutePath);
                $attachments[] = Attachment::fromPath($absolutePath)
                    ->as($fileName);
                
                Log::info("Mailable: Attachment added successfully", [
                    'path' => $absolutePath,
                    'name' => $fileName
                ]);
            } else {
                Log::warning("Mailable: Attachment not found or not readable", [
                    'path' => $absolutePath
                ]);
            }
        }

        Log::info("Mailable: Final attachments count", [
            'count' => count($attachments)
        ]);

        return $attachments;
    }
}