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
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('PUBLISHABLE_KEY'),
        'secret' => env('SECRET_KEY'),
    ],

//    'facebook' => [
//        'client_id'     => '',  //aim
//        'client_secret' => '',
//        'redirect'      => '',
//    ],

    'facebook' => [
        'client_id'     => '',
        'client_secret' => '',
        'redirect'      => env('APP_URL').'/register/facebook/callback',
    ],

//    'twitter' => [
//        'client_id'     => ' ',		//aim
//        'client_secret' => '',
//        'redirect'      => 'http://localhost:8000/register/twitter/callback',
//    ],

    'twitter' => [
        'client_id'     => '',
        'client_secret' => '',
        'access_token'  => '',
        'access_secret' => '',
        'redirect'      => env('APP_URL').'/register/twitter/callback',
    ],

//    'google' => [
//        'client_id'     => '',
//        'client_secret' => '',
//        'redirect'      =>  env('APP_URL').'/register/google/callback',
//    ],

    'google' => [
        'client_id'     => '',
        'client_secret' => '',
        'redirect'      => env('APP_URL').'/register/google/callback',
    ],

    'linkedin' => [
        'client_id'     => '',  //sambpape@gmail.com
        'client_secret' => '',
        'redirect'      => env('APP_URL').'/register/linkedin/callback',
    ],

];
