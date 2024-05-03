<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'), // Define a conexão de banco de dados padrão

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite', // Define o driver de banco de dados como SQLite
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')), // Define o arquivo de banco de dados SQLite
            'prefix' => '', // Define o prefixo de tabela (opcional)
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true), // Define se as restrições de chave estrangeira são habilitadas
        ],

        'mysql' => [
            'driver' => 'mysql', // Define o driver de banco de dados como MySQL
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'), // Define o host do banco de dados MySQL
            'port' => env('DB_PORT', '3306'), // Define a porta do banco de dados MySQL
            'database' => env('DB_DATABASE', 'laravel'), // Define o nome do banco de dados MySQL
            'username' => env('DB_USERNAME', 'root'), // Define o nome de usuário do banco de dados MySQL
            'password' => env('DB_PASSWORD', ''), // Define a senha do banco de dados MySQL
            'unix_socket' => env('DB_SOCKET', ''), // Define o socket Unix (opcional)
            'charset' => env('DB_CHARSET', 'utf8mb4'), // Define o conjunto de caracteres do banco de dados MySQL
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'), // Define a colação do banco de dados MySQL
            'prefix' => '', // Define o prefixo de tabela (opcional)
            'prefix_indexes' => true, // Define se os índices têm prefixo
            'strict' => true, // Define o modo de estrito
            'engine' => null, // Define o mecanismo de armazenamento (opcional)
            'options' => extension_loaded('pdo_mysql') ? array_filter([ // Define as opções de conexão (opcional)
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        // Adicione configurações para outros drivers de banco de dados, se necessário

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations', // Define o nome da tabela de registro de migrações
        'update_date_on_publish' => true, // Define se a data de atualização deve ser atualizada ao publicar (opcional)
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'), // Define o cliente Redis a ser utilizado

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'), // Define o prefixo para chaves de cache Redis
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'), // Define o host Redis padrão
            'username' => env('REDIS_USERNAME'), // Define o nome de usuário (opcional)
            'password' => env('REDIS_PASSWORD'), // Define a senha (opcional)
            'port' => env('REDIS_PORT', '6379'), // Define a porta Redis padrão
            'database' => env('REDIS_DB', '0'), // Define o número do banco de dados Redis padrão
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'), // Define o host Redis para cache
            'username' => env('REDIS_USERNAME'), // Define o nome de usuário (opcional)
            'password' => env('REDIS_PASSWORD'), // Define a senha (opcional)
            'port' => env('REDIS_PORT', '6379'), // Define a porta Redis para cache
            'database' => env('REDIS_CACHE_DB', '1'), // Define o número do banco de dados Redis para cache
        ],

    ],

];
