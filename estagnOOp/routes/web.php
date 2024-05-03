<?php

// Importa os controllers necessários
use App\Http\Controllers\ExameController;
use App\Http\Controllers\OpcaoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\QuestaoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Redireciona a raiz '/' para '/dashboard'
Route::redirect('/', '/dashboard');

// Agrupa rotas que exigem autenticação e verificação
Route::middleware(['auth', 'verified'])->group(function() {
    // Define a rota para o dashboard, renderizando a view 'Dashboard' usando Inertia
    Route::get('/dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');
});

// Agrupa rotas que exigem apenas autenticação
Route::middleware('auth')->group(function () {
    // Define as rotas para o perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Rota para editar perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Rota para atualizar perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Rota para excluir perfil
});

// Inclui o arquivo de rotas de autenticação
require __DIR__.'/auth.php';
