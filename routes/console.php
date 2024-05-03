<?php

use Illuminate\Foundation\Inspiring; // Importa a classe Inspiring do Laravel
use Illuminate\Support\Facades\Artisan; // Importa a fachada Artisan para registrar comandos

Artisan::command('inspire', function () { // Define um novo comando chamado 'inspire'
    $this->comment(Inspiring::quote()); // Exibe uma citação inspiradora usando o método quote() da classe Inspiring e a formata como um comentário
})->purpose('Display an inspiring quote')->hourly(); // Define a finalidade do comando e sua frequência de execução (a cada hora)
