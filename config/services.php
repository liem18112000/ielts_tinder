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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '259715891721512',
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_URL'),
    ],

    'google' => [
        'client_id' => '534466436933-7t0cml9j9lfpgbf7s48uijqb99p4vp2f.apps.googleusercontent.com',
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_URL'),
    ],

    'twilio' => [
        'sid' => 'AC62aae91ce54957c4be10dcd347a77a00',
        'token' => '4f036071e608e4c7497f284421572762',
        'key' => 'SK30875e6b838142be1ce09df6ad9c75b3',
        'secret' => 'Wfc12NdHJqMrZPRQNfiLXONkvsgwVXan'
    ]

];
