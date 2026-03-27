<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Correo predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el correo predeterminado que se utilizará para enviar todos los mensajes de correo electrónico a menos que se especifique explícitamente otro correo al enviar el mensaje. Todos los correos adicionales se pueden configurar dentro de la matriz "mailers". Se proporcionan ejemplos de cada tipo de correo.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Configuraciones de correo
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar todos los correos utilizados por tu aplicación, además de
    | sus respectivas configuraciones. Se han configurado varios ejemplos para
    | ti y eres libre de agregar los tuyos según lo requiera tu aplicación.
    |
    | Laravel admite una variedad de controladores de "transporte" de correo que se pueden usar
    | al enviar un correo electrónico. Puedes especificar cuál estás usando para
    | tus correos a continuación. También puedes agregar correos adicionales si es necesario.
    |
    | Soportados: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
            'retry_after' => 60,
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
            'retry_after' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Dirección "De" global
    |--------------------------------------------------------------------------
    |
    | Es posible que desees que todos los correos electrónicos enviados por tu aplicación se envíen desde
    | la misma dirección. Aquí puedes especificar un nombre y una dirección que se
    | utilizan globalmente para todos los correos electrónicos que se envían por tu aplicación.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel')),
    ],

];
