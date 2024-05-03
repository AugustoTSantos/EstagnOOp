<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'), // Define o canal de log padrão

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'), // Define o canal de log de depreciações
        'trace' => env('LOG_DEPRECATIONS_TRACE', false), // Define se deve rastrear as depreciações
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        'stack' => [
            'driver' => 'stack', // Define o driver como "stack" para empilhar canais de log
            'channels' => explode(',', env('LOG_STACK', 'single')), // Define os canais a serem empilhados
            'ignore_exceptions' => false, // Define se deve ignorar exceções (opcional)
        ],

        'single' => [
            'driver' => 'single', // Define o driver como "single" para log em um único arquivo
            'path' => storage_path('logs/laravel.log'), // Define o caminho do arquivo de log
            'level' => env('LOG_LEVEL', 'debug'), // Define o nível de log padrão
            'replace_placeholders' => true, // Define se deve substituir os marcadores de posição (opcional)
        ],

        'daily' => [
            'driver' => 'daily', // Define o driver como "daily" para log diário em arquivos
            'path' => storage_path('logs/laravel.log'), // Define o caminho do arquivo de log
            'level' => env('LOG_LEVEL', 'debug'), // Define o nível de log padrão
            'days' => env('LOG_DAILY_DAYS', 14), // Define a quantidade de dias para retenção de logs
            'replace_placeholders' => true, // Define se deve substituir os marcadores de posição (opcional)
        ],

        'slack' => [
            'driver' => 'slack', // Define o driver como "slack" para enviar logs para o Slack
            'url' => env('LOG_SLACK_WEBHOOK_URL'), // Define a URL do webhook do Slack
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'), // Define o nome do usuário para os logs
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'), // Define o emoji para os logs
            'level' => env('LOG_LEVEL', 'critical'), // Define o nível de log padrão
            'replace_placeholders' => true, // Define se deve substituir os marcadores de posição (opcional)
        ],

        'papertrail' => [
            'driver' => 'monolog', // Define o driver como "monolog" para integração com Papertrail
            'level' => env('LOG_LEVEL', 'debug'), // Define o nível de log padrão
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class), // Define o manipulador de log
            'handler_with' => [ // Define os parâmetros adicionais do manipulador
                'host' => env('PAPERTRAIL_URL'), // Define o host do Papertrail
                'port' => env('PAPERTRAIL_PORT'), // Define a porta do Papertrail
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'), // Define a string de conexão (opcional)
            ],
            'processors' => [PsrLogMessageProcessor::class], // Define os processadores de log (opcional)
        ],

        'stderr' => [
            'driver' => 'monolog', // Define o driver como "monolog" para log no stderr
            'level' => env('LOG_LEVEL', 'debug'), // Define o nível de log padrão
            'handler' => StreamHandler::class, // Define o manipulador de log
            'formatter' => env('LOG_STDERR_FORMATTER'), // Define o formatador de log (opcional)
            'with' => [ // Define os parâmetros adicionais do manipulador
                'stream' => 'php://stderr', // Define o fluxo para o stderr
            ],
            'processors' => [PsrLogMessageProcessor::class], // Define os processadores de log (opcional)
        ],

        'syslog' => [
            'driver' => 'syslog', // Define o driver como "syslog" para log no sistema syslog
            'level' => env('LOG_LEVEL', 'debug'), // Define o nível de log padrão
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER), // Define a instalação do sistema syslog
            'replace_placeholders' => true, // Define se deve substituir os marcadores de posição (opcional)
        ],

        'errorlog' => [
            'driver' => 'errorlog', // Define o driver como "errorlog" para log no log de erros do PHP
            'level' => env('LOG_LEVEL', 'debug'), // Define o nível de log padrão
            'replace_placeholders' => true, // Define se deve substituir os marcadores de posição (opcional)
        ],

        'null' => [
            'driver' => 'monolog', // Define o driver como "monolog" para um manipulador de log nulo
            'handler' => NullHandler::class, // Define o manipulador de log nulo
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'), // Define o caminho do arquivo de log de emergência
        ],

    ],

];
