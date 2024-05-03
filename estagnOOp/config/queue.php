<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'), // Define a conexão padrão para a fila

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        // Configuração da fila sincronizada (para desenvolvimento)
        'sync' => [
            'driver' => 'sync',
        ],

        // Configuração da fila de banco de dados
        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'), // Conexão de banco de dados
            'table' => env('DB_QUEUE_TABLE', 'jobs'), // Tabela para armazenar os trabalhos
            'queue' => env('DB_QUEUE', 'default'), // Nome da fila
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90), // Tempo antes de reprocessar trabalhos
            'after_commit' => false, // Indica se a tarefa deve ser executada após a confirmação do commit
        ],

        // Configuração da fila Beanstalkd
        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'), // Host do Beanstalkd
            'queue' => env('BEANSTALKD_QUEUE', 'default'), // Nome da fila
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90), // Tempo antes de reprocessar trabalhos
            'block_for' => 0,
            'after_commit' => false,
        ],

        // Configuração da fila SQS (Amazon Simple Queue Service)
        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'), // Chave de acesso da AWS
            'secret' => env('AWS_SECRET_ACCESS_KEY'), // Segredo de acesso da AWS
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'), // Prefixo da URL da fila
            'queue' => env('SQS_QUEUE', 'default'), // Nome da fila
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'), // Região da AWS
            'after_commit' => false,
        ],

        // Configuração da fila Redis
        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'), // Conexão Redis
            'queue' => env('REDIS_QUEUE', 'default'), // Nome da fila
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90), // Tempo antes de reprocessar trabalhos
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'), // Conexão de banco de dados para o agrupamento de trabalhos
        'table' => 'job_batches', // Tabela para armazenar informações de agrupamento de trabalhos
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Laravel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'), // Driver para armazenamento de trabalhos falhos
        'database' => env('DB_CONNECTION', 'sqlite'), // Conexão de banco de dados para armazenamento de trabalhos falhos
        'table' => 'failed_jobs', // Tabela para armazenar trabalhos falhos
    ],

];
