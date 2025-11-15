<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\EventSchedule;
use App\Models\EventEmailTemplate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class SendEventRemindersBeforeSevenDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
  protected $signature = 'events:remind-7days';
    protected $description = 'Send email reminders 7 days before event date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $targetDate = Carbon::now()->addDays(7)->toDateString();

        $events = Event::whereDate('start_date', $targetDate)
            ->where('status', 'active')
            ->get();

        foreach ($events as $event) {
            $template = EventEmailTemplate::where([
                'event_id' => $event->id,
                'send_timing' => 'before_event',
            ])->first();

            if (!$template) {
                continue;
            }

           

            $bookings = Booking::where("event_id", $event->id)->get();

            foreach ($bookings as $booking) {
                if (!$booking->email) {
                    continue;
                }

                $replacements = [
                    '{{ name }}' => $booking->name,
                    '{{ schedule }}' => $schedule->title ?? '',
                    '{{ start_time }}' => $schedule->start_time ?? '',
                    '{{ title }}' => $event->title,
                    '{{ start_date }}' => Carbon::parse($event->start_date)->format('F j, Y'),
                    '{{ end_date }}' => Carbon::parse($event->end_date)->format('F j, Y'),
                    '{{ venue }}' => $event->venue,
                    '{{ location }}' => $event->location,
                ];

                $body = str_replace(array_keys($replacements), array_values($replacements), $template->body);
                $htmlContent = view('admin.mail.event_mail', ['content' => $body])->render();

                $this->sendEmail($booking->email, $template->subject, $htmlContent);
            }
        }

        $this->info('Reminder emails sent successfully.');
    }

    protected function sendEmail($to, $subject, $html)
    {
        $to = $this->cleanEmail($to);
        if (!$this->isValidEmail($to)) {
            Log::error('Invalid email format', ['email' => $to]);
            return $this->sendFallbackEmail($to, $subject, $html);
        }

        if ($this->sendViaBrevo($to, $subject, $html)) {
            return true;
        }

        return $this->sendFallbackEmail($to, $subject, $html);
    }

    protected function sendViaBrevo($to, $subject, $html)
    {
        try {
            $response = Http::withHeaders([
                'api-key' => env('BREVO_API_KEY'),
                'accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->post('https://api.brevo.com/v3/smtp/email', [
                'sender' => [
                    'name' => env('BREVO_FROM_NAME', config('app.name')),
                    'email' => env('BREVO_FROM_ADDRESS', config('mail.from.address')),
                ],
                'to' => [['email' => $to]],
                'subject' => $subject,
                'htmlContent' => $html,
            ]);

            Log::info('Email sent via Brevo', [
                'to' => $to,
                'response' => $response->body(),
            ]);

            return $response->successful();

        } catch (\Exception $e) {
            Log::error('Brevo Email Failed', [
                'error' => $e->getMessage(),
                'email' => $to
            ]);
            return false;
        }
    }

    protected function sendFallbackEmail($to, $subject, $html)
    {
        try {
            Mail::send([], [], function ($message) use ($to, $subject, $html) {
                $message->to($to)
                    ->subject($subject)
                    ->html($html);
            });

            Log::warning('Fallback email sent via Laravel Mail', ['email' => $to]);
            return true;

        } catch (\Exception $e) {
            Log::error('Fallback email failed', [
                'email' => $to,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    protected function cleanEmail($email)
    {
        return strtolower(trim($email));
    }

    protected function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
