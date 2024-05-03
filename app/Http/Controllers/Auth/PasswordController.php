<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        // Valida os dados da requisição
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'], // Validação personalizada para a senha atual do usuário
            'password' => ['required', Password::defaults(), 'confirmed'], // Validação para a nova senha do usuário
        ]);

        // Atualiza a senha do usuário no banco de dados
        $request->user()->update([
            'password' => Hash::make($validated['password']), // Armazena a nova senha após a hash
        ]);

        // Retorna o usuário para a página anterior
        return back();
    }
}
