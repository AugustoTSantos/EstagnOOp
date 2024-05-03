<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        // Renderiza a view de login utilizando Inertia
        return Inertia::render('Auth/Login', [
            // Verifica se a rota de redefinição de senha está disponível
            'canResetPassword' => Route::has('password.request'),
            // Recupera uma mensagem de status da sessão, se houver
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentica o usuário com as credenciais fornecidas no request
        $request->authenticate();

        // Regenera a sessão para prevenir ataques de sessão
        $request->session()->regenerate();

        // Redireciona o usuário para a página de destino originalmente solicitada
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Faz logout do usuário autenticado
        Auth::guard('web')->logout();

        // Invalida a sessão existente
        $request->session()->invalidate();

        // Regenera o token da sessão para prevenir ataques de falsificação de solicitação entre sites (CSRF)
        $request->session()->regenerateToken();

        // Redireciona o usuário de volta para a página inicial
        return redirect('/');
    }
}
