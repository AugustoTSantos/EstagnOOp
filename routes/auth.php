<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Grupo de middleware para rotas acessíveis apenas por usuários convidados
Route::middleware('guest')->group(function () {

    // Rota para exibir o formulário de registro
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    // Rota para processar o envio do formulário de registro
    Route::post('register', [RegisteredUserController::class, 'store']);
    // Rota para exibir o formulário de login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    // Rota para processar o envio do formulário de login
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // Rota para exibir o formulário de solicitação de redefinição de senha
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    // Rota para processar o envio do formulário de solicitação de redefinição de senha
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    // Rota para exibir o formulário de redefinição de senha com base no token fornecido
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    // Rota para processar o envio do formulário de redefinição de senha
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Grupo de middleware para rotas acessíveis apenas por usuários autenticados
Route::middleware('auth')->group(function () {

    // Rota para exibir a página de notificação de verificação de e-mail
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    // Rota para verificar o token de verificação de e-mail fornecido
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Rota para enviar notificação de verificação de e-mail
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Rota para exibir o formulário de confirmação de senha
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    // Rota para processar o envio do formulário de confirmação de senha
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Rota para atualizar a senha do usuário autenticado
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Rota para fazer logout do usuário autenticado
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
