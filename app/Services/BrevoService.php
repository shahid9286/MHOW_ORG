<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrevoService
{
    protected $apiUrl = "https://api.brevo.com/v3/smtp/email";

    public function sendEmail($toEmail, $toName, $subject, $htmlContent)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => env('BREVO_API_KEY'),
            'content-type' => 'application/json',
        ])->post($this->apiUrl, [
                    'sender' => [
                        'name' => env('BREVO_FROM_NAME'),
                        'email' => env('BREVO_FROM_ADDRESS'),
                    ],
                    'to' => [
                        [
                            'email' => $toEmail,
                            'name' => $toName,
                        ]
                    ],
                    'subject' => $subject,
                    'htmlContent' => $htmlContent,
                ]);

        return $response->json();
    }
}
