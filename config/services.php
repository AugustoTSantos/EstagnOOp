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

    // Configuração para o serviço Postmark
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'), // Token de autenticação do Postmark
    ],

    // Configuração para o serviço SES (Amazon Simple Email Service)
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'), // Chave de acesso da AWS
        'secret' => env('AWS_SECRET_ACCESS_KEY'), // Segredo de acesso da AWS
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'), // Região padrão da AWS
    ],

    // Configuração para o serviço Slack
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'), // Token de autenticação do bot do Slack
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'), // Canal padrão para notificações do Slack
        ],
    ],

];
