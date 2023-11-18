<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TwoCheckoutService
{
    protected $merchantCode;
    protected $secretKey;
    protected $publishableKey;
    protected $sandbox;

    public function __construct()
    {
        $this->merchantCode = config('services.two_checkout.merchant_code');
        $this->secretKey = config('services.two_checkout.secret_key');
        $this->publishableKey = config('services.two_checkout.publishable_key');
        $this->sandbox = config('services.two_checkout.sandbox');
    }

    public function generateToken($orderID, $amount, $currency) {
        $response = Http::post('https://sandbox.2checkout.com/token', [
            'sellerId' => $this->merchantCode,
            'privateKey' => $this->secretKey,
            'publishableKey' => $this->publishableKey,
            'currency' => $currency,
            'token' => 'your_token', // يجب استبداله بفعلي
            'order_id' => $orderID,
            'amount' => $amount,
        ]);
        return $response->json();
    }

    public function purchase(array $parameter) {
        $response = Http::post('https://sandbox.2checkout.com/purchase', $parameter);
        return $response->json();
    }

    public function refund(array $parameter) {
        $response = Http::post('https://sandbox.2checkout.com/refund', $parameter);
        return $response->json();
    }
}