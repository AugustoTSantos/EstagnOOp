<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        // Renderiza a view de registro
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida os dados da requisição
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class, // Verifica se o e-mail já está em uso
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Validação para a senha
        ]);

        // Cria um novo usuário com os dados fornecidos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash da senha
        ]);

        // Dispara o evento de registro
        event(new Registered($user));

        // Autentica o novo usuário
        Auth::login($user);

        // Redireciona o usuário para a página do painel
        return redirect(route('dashboard', absolute: false));
    }
}
