<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => LilyFlower\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
    'client_id' => '361357565621-uovqiptki6cegeur45lmhesu3j4c4vvv.apps.googleusercontent.com',
    'client_secret' => '_B4zNAy--af1DjACTjTRauDi',
    //'redirect' => 'http://twlilyflower.tk/auth/google/callback',
    'redirect' => 'http://ec2-52-198-88-53.ap-northeast-1.compute.amazonaws.com/auth/google/callback',
    //'redirect' => 'http://localhost:8000/auth/google/callback',

    ],

];
