<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\StripeSubscription as Subscription;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeController extends Controller
{
    protected $paypal;

    public function __construct(PayPalService $paypal)
    {
        $this->paypal = $paypal;
    }

    public function createCheckout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::create([
            'mode' => 'subscription',
            'payment_method_types' => ['card'],

            'line_items' => [[
                'price' => $request->price_id,
                'quantity' => 1,
            ]],
            // 'customer_email' => auth()->user()->email,
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        return view('website.success-page');
    }

    public function cancel()
    {
        return view('website.cancel-page');
    }

    // public function checkout()
    // {
    //     $provider = new \Srmklive\PayPal\Services\PayPal;

    //     $provider->setApiCredentials([
    //         'mode' => 'sandbox',
    //         'sandbox' => [
    //             'client_id' => 'AaJpUFBJAT9v8rGgtS36uzzZucJ7JxeySBbGHsD5xwPalWSKqxJ01qkPWd1dMFHP-qrC8KOEGEjJYL-a',
    //             'client_secret' => 'EOU6HyYnAo_aBF-0GIj0EHk9ZVNXBj2MWRXaHRDvrVt1Gpf-vf2RrrReDWTfq3iV-oKVhZHzpqobjtvF',
    //             'app_id' => '',
    //         ],
    //         'live' => [
    //             'client_id' => '',
    //             'client_secret' => '',
    //             'app_id' => '',
    //         ],
    //         'payment_action' => 'Sale',
    //         'currency' => 'USD',
    //         'notify_url' => '',
    //         'locale' => '',
    //         'validate_ssl' => true,
    //     ]);

    //     // DEBUG: Check token
    //     $token = $provider->getAccessToken();
    //     // should return a string

    //     $order = $provider->createOrder([
    //         'intent' => 'CAPTURE',
    //         'purchase_units' => [
    //             [
    //                 'amount' => [
    //                     'currency_code' => 'USD',
    //                     'value' => '1.00',
    //                 ],
    //             ],
    //         ],
    //         'application_context' => [
    //             'return_url' => route('paypal.success'),
    //             'cancel_url' => route('paypal.cancel'),
    //         ],
    //     ]);

    //     foreach ($order['links'] as $link) {
    //         if ($link['rel'] === 'approve') {
    //             return redirect()->away($link['href']);
    //         }
    //     }

    //     return 'Failed to create PayPal order!';
    // }

    // public function paypalSuccess(Request $request)
    // {
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials([
    //         'mode' => 'sandbox',
    //         'sandbox' => [
    //             'client_id' => 'AaJpUFBJAT9v8rGgtS36uzzZucJ7JxeySBbGHsD5xwPalWSKqxJ01qkPWd1dMFHP-qrC8KOEGEjJYL-a',
    //             'client_secret' => 'EOU6HyYnAo_aBF-0GIj0EHk9ZVNXBj2MWRXaHRDvrVt1Gpf-vf2RrrReDWTfq3iV-oKVhZHzpqobjtvF',
    //             'app_id' => '',
    //         ],
    //         'live' => [
    //             'client_id' => '',
    //             'client_secret' => '',
    //             'app_id' => '',
    //         ],
    //         'payment_action' => 'Sale',
    //         'currency' => 'USD',
    //         'notify_url' => '',
    //         'locale' => '',
    //         'validate_ssl' => true,
    //     ]);
    //     $provider->getAccessToken();

    //     // Capture the order after approval
    //     $response = $provider->capturePaymentOrder($request->token);

    //     if (isset($response['status']) && $response['status'] === 'COMPLETED') {

    //         // You can store payment in DB here
    //         // Payment successful
    //         return 'Payment Successful ✔';
    //     }

    //     return 'Payment Failed ❌';
    // }

    // /**
    //  * Cancel payment
    //  */
    // public function paypalCancel()
    // {
    //     return 'Payment Cancelled ❌';
    // }

    public function payment()
    {
        $amount = 10;
        $currency = 'USD';

        try {
            $order = $this->paypal->createOrder(
                $amount,
                $currency,
                route('paypal.success'),
                route('paypal.cancel'),
                'Payment for Service'
            );

            // Store order_id temporarily in DB if needed
            // PaymentModel::create([
            //     'order_id' => $order->id,
            //     'amount' => $amount,
            //     'currency' => $currency,
            //     'status' => $order->status
            // ]);

            $approvalUrl = $this->paypal->getApprovalUrl($order);

            if ($approvalUrl) {
                return redirect()->away($approvalUrl);
            }

            return redirect()->back()->with('error', 'No approval URL found in PayPal response.');

        } catch (\Exception $e) {
            Log::error('Payment Creation Error: '.$e->getMessage());

            return redirect()->back()->with('error', 'Payment failed: '.$e->getMessage());
        }
    }

    public function paypalSuccess(Request $request)
    {
        try {
            $token = $request->get('token');
            $orderId = $request->get('token') ?: $request->get('orderId');

            if (! $orderId) {
                return redirect()->route('paypal.cancel')->with('error', 'No order ID provided.');
            }

            // Capture the order
            $capturedOrder = $this->paypal->captureOrder($orderId);

            if ($this->paypal->isPaymentCompleted($capturedOrder)) {
                // Update your payment record in database
                // PaymentModel::where('order_id', $orderId)->update(['status' => 'completed']);

                return redirect()->route('home')->with('success', 'Payment completed successfully!');
            }

            return redirect()->route('paypal.cancel')->with('error', 'Payment not completed!');

        } catch (\Exception $e) {
            Log::error('Payment Capture Error: '.$e->getMessage());

            return redirect()->route('paypal.cancel')->with('error', 'Payment execution failed: '.$e->getMessage());
        }
    }

    public function paypalCancel()
    {
        return redirect()->route('/')->with('error', 'Payment was cancelled!');
    }

    public function handleWebhook(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $payload = $request->getContent();
        $sig = $request->header('Stripe-Signature');
        $secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sig, $secret);

            if ($event->type === 'checkout.session.completed') {

                $session = $event->data->object;

                Subscription::create([
                    'user_id' => $session->metadata->user_id,
                    'stripe_customer_id' => $session->customer,
                    'stripe_subscription_id' => $session->subscription,
                    'stripe_price_id' => $session->metadata->plan,
                    'name' => $session->customer_details->name ?? null,
                    'email' => $session->customer_details->email ?? null,
                    'phone' => $session->customer_details->phone ?? null,
                    'status' => 'active',
                ]);
            }

            return response('OK', 200);

        } catch (\Exception $e) {
            Log::error('Webhook Error: '.$e->getMessage());

            return response('Invalid', 400);
        }
    }
}
