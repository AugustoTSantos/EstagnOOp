<?php

// Importa a classe Request do Laravel para capturar a solicitação HTTP
use Illuminate\Http\Request;

// Define a constante LARAVEL_START como o tempo atual em microsegundos
define('LARAVEL_START', microtime(true));

// Determina se a aplicação está em modo de manutenção verificando se o arquivo de manutenção existe
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    // Inclui o arquivo de manutenção
    require $maintenance;
}

// Registra o autoloader do Composer para carregar automaticamente as classes PHP
require __DIR__.'/../vendor/autoload.php';

// Inicializa o Laravel e manipula a solicitação HTTP capturada
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
