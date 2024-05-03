<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): Response
    {
        // Renderiza a view para confirmar a senha usando o pacote Inertia
        return Inertia::render('Auth/ConfirmPassword');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida as credenciais do usuário (email e senha)
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            // Se as credenciais não forem válidas, lança uma exceção de validação com uma mensagem de erro
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Armazena o momento da confirmação da senha na sessão
        $request->session()->put('auth.password_confirmed_at', time());

        // Redireciona o usuário para a página de destino originalmente solicitada
        return redirect()->intended(route('dashboard', absolute: false));
    }
}
