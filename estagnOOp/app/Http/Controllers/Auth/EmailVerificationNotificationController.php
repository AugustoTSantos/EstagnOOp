<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // Verifica se o e-mail do usuário já foi verificado
        if ($request->user()->hasVerifiedEmail()) {
            // Se o e-mail já foi verificado, redireciona o usuário para a página de destino originalmente solicitada (ou a página do painel)
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Se o e-mail ainda não foi verificado, envia uma nova notificação de verificação por e-mail para o usuário
        $request->user()->sendEmailVerificationNotification();

        // Retorna o usuário para a página anterior com uma mensagem de status informando que o link de verificação foi enviado
        return back()->with('status', 'verification-link-sent');
    }
}
