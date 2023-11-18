<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'recaptcha' => [
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret_key' => env('RECAPTCHA_SECRET_KEY'),
    ],

    'paypal' => [
        'username' => 'sb-mc8t4327545437_api1.business.example.com',
        'password' => 'EMQF5XX3PHYM8RQP',
        'signature' => 'AKT9YF3SRMaJwCYrIl0ZYYCB3ktdAGx39PQH4yxqi6IsDRr-hn9ucIiT',
        'sandbox' => true,
    ],

    /*'two_checkout' => [
        'merchant_code' => '',
        'password' => ')*6G|mp7sJur1tFIBDx9',
        'signature' => 'shfba3d?WsAX5%QKrANnJ$AVHBYr6gV&?gYNzN&FfA%VCXRCb2b*QTHQTqdHDTTB',
        'sandbox' => true,
    ]*/
    'two_checkout' => [
        'merchant_code' => '254746336593',
        'secret_key' => ')*6G|mp7sJur1tFIBDx9',
        'publishable_key' => '9019CEB6-0989-45FB-8317-19127B5B6344',
        'sandbox' => true,
    ],

];