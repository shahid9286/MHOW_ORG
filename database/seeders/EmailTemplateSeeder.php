<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateSeeder extends Seeder
{
    public function run()
    {
        DB::table('email_templates')->insert([
            // 🧭 Tour Booking Confirmation Template
            [
                'title' => 'Professional Tour Booking Confirmation',
                'category' => 'Tour',
                'slug' => 'tour-booking-confirmation',
                'subject' => 'Booking Confirmed — {{event_name}}',
                'body' => '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #f7f9fb;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .header {
            background-color: #0b74de;
            color: #ffffff;
            text-align: center;
            padding: 25px 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 0.5px;
        }
        .content {
            padding: 30px;
        }
        .content h2 {
            color: #0b74de;
            margin-bottom: 10px;
        }
        .content p {
            line-height: 1.6;
            margin: 10px 0;
        }
        .details {
            background: #f3f6fa;
            padding: 15px 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .details li {
            margin: 6px 0;
            list-style: none;
        }
        .details strong {
            width: 140px;
            display: inline-block;
        }
        .footer {
            background: #0b74de;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }
        .footer a {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Tour Booking Confirmed</h1>
        </div>
        <div class="content">
            <h2>Hello {{booking_person_name}},</h2>
            <p>We are delighted to confirm your booking for the <strong>{{event_name}}</strong> tour.</p>
            <p>Below are your booking details:</p>

            <ul class="details">
                <li><strong>Event Name:</strong> {{event_name}}</li>
                <li><strong>Booked By:</strong> {{booking_person_name}}</li>
                <li><strong>Email:</strong> {{booking_person_email}}</li>
            </ul>

            <p>Our team will contact you shortly with further details regarding your tour schedule and itinerary.</p>
            <p>We appreciate your trust in us and look forward to providing you an unforgettable experience.</p>

            <p>Warm regards,<br>
            <strong>The Tour Team</strong><br>
            <small>For assistance, reach us at <a href="mailto:support@tours.com">support@tours.com</a></small></p>
        </div>
        <div class="footer">
            &copy; {{year}} The Tour Company. All rights reserved.<br>
            <a href="#">Visit our website</a> | <a href="#">Unsubscribe</a>
        </div>
    </div>
</body>
</html>
                ',
                'variables' => json_encode([
                    'event_name' => 'Name of the event or tour',
                    'booking_person_name' => 'Name of the person who booked the tour',
                    'booking_person_email' => 'Email of the person who booked the tour',
                    'year' => 'Current year',
                ]),
                'description' => 'A professional email sent to confirm a tour booking.',
                'is_active' => true,
                'notes_header' => 'Used for booking confirmation emails.',
                'notes_footer' => 'Supports HTML, responsive on mobile.',
                'notes' => 'Make sure to replace all {{variables}} before sending.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 💌 Donor Thank You Template
            [
                'title' => 'Donor Appreciation Email',
                'category' => 'Donor',
                'slug' => 'donor-thank-you',
                'subject' => 'Thank You for Your Support, {{donor_name}}!',
                'body' => '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .header {
            background-color: #28a745;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .content {
            padding: 25px;
            color: #333;
        }
        .content p {
            line-height: 1.6;
        }
        .footer {
            background: #28a745;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Thank You, {{donor_name}}!</h2>
        </div>
        <div class="content">
            <p>We are truly grateful for your kind donation and continued support.</p>
            <p><strong>Donor Details:</strong></p>
            <ul>
                <li><strong>Email:</strong> {{donor_email}}</li>
                <li><strong>Phone:</strong> {{donor_phone}}</li>
                <li><strong>City:</strong> {{donor_city}}</li>
                <li><strong>WhatsApp:</strong> {{donor_whatsapp}}</li>
            </ul>
            <p>Your generosity empowers us to keep making a difference.</p>
            <p>With heartfelt thanks,<br><strong>{{organization_name}}</strong></p>
        </div>
    </div>
</body>
</html>
                ',
                'variables' => json_encode([
                    'donor_name' => 'Full name of the donor',
                    'donor_email' => 'Email address of the donor',
                    'donor_phone' => 'Phone number of the donor',
                    'donor_city' => 'City of the donor',
                    'donor_whatsapp' => 'WhatsApp number of the donor',
                    'organization_name' => 'Name of your organization',
                    'year' => 'Current year',
                ]),
                'description' => 'Email sent to thank donors after a successful contribution.',
                'is_active' => true,
                'notes_header' => 'Used for donation acknowledgment.',
                'notes_footer' => 'Ensure all donor fields are available before sending.',
                'notes' => 'Supports dynamic variables and HTML layout.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
