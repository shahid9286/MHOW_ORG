<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
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

}
