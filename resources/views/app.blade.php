<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> <!-- Define o conjunto de caracteres UTF-8 -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Define a largura da viewport e a escala inicial -->

        <title inertia>{{ config('app.name', 'Laravel') }}</title> <!-- Define o título da página usando o helper inertia -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net"> <!-- Pré-conecta ao servidor de fontes -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> <!-- Importa a fonte Figtree do servidor de fontes -->

        <!-- Scripts -->
        @routes <!-- Define as rotas do aplicativo -->
        @viteReactRefresh <!-- Adiciona suporte para atualizações rápidas em tempo real no ambiente de desenvolvimento -->
        @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"]) <!-- Carrega os scripts JavaScript compilados pelo Vite -->
        @inertiaHead <!-- Renderiza os meta tags do Inertia.js -->
    </head>
    <body class="font-sans antialiased"> <!-- Define a classe para o corpo da página -->
        @inertia <!-- Renderiza a aplicação Inertia -->
    </body>
</html>
