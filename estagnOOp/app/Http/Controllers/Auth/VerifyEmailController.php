<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Verifica se o e-mail do usuário já foi verificado anteriormente
        if ($request->user()->hasVerifiedEmail()) {
            // Se o e-mail já foi verificado, redireciona o usuário para a página do painel com um parâmetro de URL para indicar que o e-mail foi verificado
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        // Marca o e-mail do usuário como verificado
        if ($request->user()->markEmailAsVerified()) {
            // Se o e-mail foi marcado como verificado com sucesso, dispara o evento 'Verified'
            event(new Verified($request->user()));
        }

        // Redireciona o usuário para a página do painel com um parâmetro de URL para indicar que o e-mail foi verificado
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
