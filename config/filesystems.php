<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'), // Define o disco de sistema de arquivos padrão

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local', // Define o driver como "local" para armazenamento local
            'root' => storage_path('app'), // Define o diretório raiz para o disco "local"
            'throw' => false, // Define se devem ser lançadas exceções em caso de erros (opcional)
        ],

        'public' => [
            'driver' => 'local', // Define o driver como "local" para armazenamento local
            'root' => storage_path('app/public'), // Define o diretório raiz para o disco "public"
            'url' => env('APP_URL').'/storage', // Define a URL base para o disco "public"
            'visibility' => 'public', // Define a visibilidade dos arquivos (público)
            'throw' => false, // Define se devem ser lançadas exceções em caso de erros (opcional)
        ],

        's3' => [
            'driver' => 's3', // Define o driver como "s3" para armazenamento na Amazon S3
            'key' => env('AWS_ACCESS_KEY_ID'), // Define a chave de acesso da AWS
            'secret' => env('AWS_SECRET_ACCESS_KEY'), // Define o segredo de acesso da AWS
            'region' => env('AWS_DEFAULT_REGION'), // Define a região da AWS
            'bucket' => env('AWS_BUCKET'), // Define o nome do bucket na AWS
            'url' => env('AWS_URL'), // Define a URL base para o disco "s3" (opcional)
            'endpoint' => env('AWS_ENDPOINT'), // Define o endpoint da AWS (opcional)
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false), // Define se deve usar um endpoint de estilo de caminho (opcional)
            'throw' => false, // Define se devem ser lançadas exceções em caso de erros (opcional)
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'), // Define os links simbólicos a serem criados (opcional)
    ],

];
