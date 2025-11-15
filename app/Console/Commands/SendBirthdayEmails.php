<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Donor;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendBirthdayEmails extends Command
{
    protected $signature = 'donors:birthday-emails';
    protected $description = 'Send birthday emails to donors';
    public function handle()
    {
        $today = Carbon::today()->format('m-d');
        $donors = Donor::whereRaw("DATE_FORMAT(date_of_birth, '%m-%d') = ?", [$today])->get();
        if ($donors->isEmpty()) {
            $this->info('No birthdays today.');
            return;
        }
        $template = EmailTemplate::where('title', 'Birthday Email')
            ->where('status', 'active')
            ->first();

        if (!$template) {
            $this->error('Birthday template not found or inactive.');
            return;
        }

        foreach ($donors as $donor) {
            $body = str_replace(
                ['{{ donor_name }}', '{{donate_url}}', '{{year}}'],
                [$donor->name, url('donate'), now()->year],
                $template->body
            );

            try {
                Mail::send([], [], function ($message) use ($donor, $template, $body) {
                    $message->to($donor->email, $donor->name)
                        ->subject($template->subject)
                        ->html($body)
                        ->from(env('BREVO_FROM_ADDRESS'), env('BREVO_FROM_NAME'));
                });

                $this->info("Sent birthday email to: {$donor->email}");
            } catch (\Exception $e) {
                $this->error("Failed to send email to {$donor->email}: " . $e->getMessage());
            }
        }
    }
}
