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
//        'client_id'     => '907831576088877',  //aim
//        'client_secret' => 'be4a6f93762538ba876f4b7e7d964084',
//        'redirect'      => 'http://localhost:8000/register/facebook/callback',
//    ],

    'facebook' => [
        'client_id'     => '685538751851466',
        'client_secret' => '4428ce681b855676d5392ed5bd1673a7',
        'redirect'      => 'https://aim.it/register/facebook/callback',
    ],

//    'twitter' => [
//        'client_id'     => 'Dq8yUG8w6VRxzuTonNOaGcWct ',		//aim
//        'client_secret' => 'a0sbzIlejryFnvF8MGKdnccttd8qk6XuZMsnYeJ9fjaYtdM0AT',
//        'redirect'      => 'http://localhost:8000/register/twitter/callback',
//    ],

    'twitter' => [
        'client_id'     => '0wTfFV638c0O0DetUmYMHwK0q',
        'client_secret' => 'D4TeQym3BIVTM4hrjcDeImhylb1eMH5g50nZKIs2teX1YaOQRn',
        'access_token'  => '1149704559125602304-5qerjPk2XirN0yijHyc2siy2tYRFqu',
        'access_secret' => 'EXcWDxkJtOCS4GpiEPQ2CkQ5gn5LbgXL5XbQpZPh27UP9',
        'redirect'      => 'http://aim.it/register/twitter/callback',
    ],

//    'google' => [
//        'client_id'     => '757620955217-01vj1b20j6c6pvu0d4hc91hl28lora5u.apps.googleusercontent.com',
//        'client_secret' => 'DmQT0l-oV5GP3G5BEX3HGz2X',
//        'redirect'      =>  env('APP_URL').'/register/google/callback',
//    ],

    'google' => [
        'client_id'     => '1037518438842-v039rqcaml1jml7f77ddvppgmmnlkql2.apps.googleusercontent.com',
        'client_secret' => '7PWHtWFLIgvzIgSYXCf8Wwd0',
        'redirect'      =>  'http://aim.it/register/google/callback',
    ],

    'linkedin' => [
        'client_id'     => '78xqx8tdrqs8i4',  //sambpape@gmail.com
        'client_secret' => 'avG2BOJU7uzRKubV',
        'redirect'      => 'http://aim.it/register/linkedin/callback',
    ],

];
