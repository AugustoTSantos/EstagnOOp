<?php

use Illuminate\Foundation\Application; // Importa a classe Application do Laravel
use Illuminate\Foundation\Configuration\Exceptions; // Importa a classe de configuração de exceções do Laravel
use Illuminate\Foundation\Configuration\Middleware; // Importa a classe de configuração de middlewares do Laravel

return Application::configure(basePath: dirname(__DIR__)) // Configura a aplicação Laravel com o diretório base sendo o diretório pai do diretório atual
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // Define o arquivo de rotas da aplicação web
        commands: __DIR__.'/../routes/console.php', // Define o arquivo de rotas da CLI (linha de comando)
        health: '/up', // Define um endpoint de saúde para verificar se a aplicação está funcionando corretamente
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class, // Adiciona o middleware para integrar com o framework JavaScript Inertia.js
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class, // Adiciona o middleware para adicionar cabeçalhos de link para ativos pré-carregados
        ]);
        // Outros middlewares podem ser definidos aqui
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Permite definir tratamento de exceções personalizado, mas atualmente está vazio
    })
    ->create(); // Cria a aplicação Laravel com as configurações fornecidas
