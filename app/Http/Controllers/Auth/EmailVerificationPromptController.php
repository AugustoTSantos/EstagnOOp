<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        // Verifica se o e-mail do usuário já foi verificado
        return $request->user()->hasVerifiedEmail()
            // Se o e-mail do usuário já foi verificado, redireciona para a página de destino originalmente solicitada (ou a página do painel)
            ? redirect()->intended(route('dashboard', absolute: false))
            // Se o e-mail ainda não foi verificado, renderiza a view para solicitar a verificação de e-mail, passando a mensagem de status, se houver
            : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}
