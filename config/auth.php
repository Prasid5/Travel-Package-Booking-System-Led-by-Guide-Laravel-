<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER_TOURISTS', 'tourists'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | A default configuration has been defined which uses session storage
    | and the Eloquent user provider for tourists and guides.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'tourists',
        ],
        'guide' => [
            'driver' => 'session',
            'provider' => 'guides',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | User providers define how users are retrieved out of your database
    | or other storage systems used by the application. You may configure
    | multiple providers for different user tables or models.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'tourists' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL_TOURISTS', App\Models\Tourists::class),
        ],
        'guides' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL_GUIDES', App\Models\Guides::class),
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL_ADMIN', App\Models\Admin::class),
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configurations specify password reset functionality, including
    | the table used for tokens and the user provider invoked to retrieve
    | users. You can also define expiration time for the tokens.
    |
    */

    'passwords' => [
        'tourists' => [
            'provider' => 'tourists',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        'guides' => [
            'provider' => 'guides',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        'admin' => [
            'provider' => 'admin',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Define the number of seconds before a password confirmation window
    | expires and users are asked to re-enter their password.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
