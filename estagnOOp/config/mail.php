<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'), // Define o mailer padrão, usando 'log' se não estiver definido

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "log", "array", "failover", "roundrobin"
    |
    */

    'mailers' => [

        // Configuração do mailer SMTP
        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'), // URL do servidor de e-mail
            'host' => env('MAIL_HOST', '127.0.0.1'), // Host do servidor de e-mail
            'port' => env('MAIL_PORT', 2525), // Porta do servidor de e-mail
            'encryption' => env('MAIL_ENCRYPTION', 'tls'), // Tipo de criptografia
            'username' => env('MAIL_USERNAME'), // Nome de usuário do servidor de e-mail
            'password' => env('MAIL_PASSWORD'), // Senha do servidor de e-mail
            'timeout' => null, // Tempo limite da conexão
            'local_domain' => env('MAIL_EHLO_DOMAIN'), // Domínio local para HELO / EHLO
        ],

        // Configuração do mailer SES (Amazon Simple Email Service)
        'ses' => [
            'transport' => 'ses',
        ],

        // Configuração do mailer Postmark
        'postmark' => [
            'transport' => 'postmark',
        ],

        // Configuração do mailer Sendmail
        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'), // Caminho do Sendmail
        ],

        // Configuração do mailer Log
        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'), // Canal de log
        ],

        // Configuração do mailer Array (para testes)
        'array' => [
            'transport' => 'array',
        ],

        // Configuração do mailer Failover (para fallback)
        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp', // Mailer principal
                'log', // Mailer de fallback
            ],
        ],

        // Configuração do mailer Round Robin (para balanceamento de carga)
        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses', // Mailer 1
                'postmark', // Mailer 2
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'), // Endereço de e-mail padrão do remetente
        'name' => env('MAIL_FROM_NAME', 'Example'), // Nome do remetente
    ],

];
