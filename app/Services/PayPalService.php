<?php

namespace App\Services;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Payments\AuthorizationsCaptureRequest;
use Exception;

class PayPalService
{
    protected $client;

    public function __construct()
    {
        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_SECRET');
        
        if (env('PAYPAL_MODE', 'sandbox') == 'live') {
            $environment = new ProductionEnvironment($clientId, $clientSecret);
        } else {
            $environment = new SandboxEnvironment($clientId, $clientSecret);
        }
        
        $this->client = new PayPalHttpClient($environment);
    }

    /**
     * Create a PayPal order
     */
    public function createOrder($amount, $currency, $returnUrl, $cancelUrl, $description = null)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        
        $body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => $currency,
                    "value" => $amount
                ]
            ]],
            "application_context" => [
                "return_url" => $returnUrl,
                "cancel_url" => $cancelUrl,
                "brand_name" => env('APP_NAME', 'Your App Name'),
                "user_action" => "PAY_NOW"
            ]
        ];

        // Add description if provided
        if ($description) {
            $body["purchase_units"][0]["description"] = $description;
        }

        $request->body = $body;

        try {
            $response = $this->client->execute($request);
            
            \Log::info('PayPal Order Created', [
                'order_id' => $response->result->id,
                'status' => $response->result->status
            ]);
            
            return $response->result;
        } catch (Exception $e) {
            \Log::error('PayPal Order Creation Failed', [
                'error' => $e->getMessage(),
                'amount' => $amount,
                'currency' => $currency
            ]);
            throw new Exception('PayPal order creation failed: ' . $e->getMessage());
        }
    }

    /**
     * Capture a PayPal order
     */
    public function captureOrder($orderId)
    {
        $request = new OrdersCaptureRequest($orderId);
        
        try {
            $response = $this->client->execute($request);
            
            \Log::info('PayPal Order Captured', [
                'order_id' => $orderId,
                'status' => $response->result->status,
                'capture_id' => $response->result->purchase_units[0]->payments->captures[0]->id ?? null
            ]);
            
            return $response->result;
        } catch (Exception $e) {
            \Log::error('PayPal Order Capture Failed', [
                'order_id' => $orderId,
                'error' => $e->getMessage()
            ]);
            throw new Exception('PayPal order capture failed: ' . $e->getMessage());
        }
    }

    /**
     * Get order details
     */
    public function getOrder($orderId)
    {
        // You might need to implement this based on your needs
        // The SDK might have a OrdersGetRequest class
        try {
            // This is a simplified example - you might need to adjust based on actual SDK methods
            $request = new \PayPalCheckoutSdk\Orders\OrdersGetRequest($orderId);
            $response = $this->client->execute($request);
            return $response->result;
        } catch (Exception $e) {
            throw new Exception('Failed to get order details: ' . $e->getMessage());
        }
    }

    /**
     * Check if payment was successful
     */
    public function isPaymentCompleted($order)
    {
        return isset($order->status) && $order->status === 'COMPLETED';
    }

    /**
     * Get the approval URL from the order
     */
    public function getApprovalUrl($order)
    {
        foreach ($order->links as $link) {
            if ($link->rel === 'approve') {
                return $link->href;
            }
        }
        return null;
    }
}