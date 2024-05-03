<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): Response
    {
        // Renderiza a view para solicitar o link de redefinição de senha, passando a mensagem de status, se houver
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida os dados da requisição
        $request->validate([
            'email' => 'required|email',
        ]);

        // Envia o link de redefinição de senha para o e-mail fornecido
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Se o link de redefinição de senha for enviado com sucesso, redireciona o usuário de volta com uma mensagem de status
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        // Se houver algum erro no envio do link de redefinição de senha, lança uma exceção de validação com a mensagem de erro correspondente
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}
