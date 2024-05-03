<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'], // O campo 'name' é obrigatório, deve ser uma string e ter no máximo 255 caracteres
            'email' => [
                'required', // O campo 'email' é obrigatório
                'string', // Deve ser uma string
                'lowercase', // Converte o e-mail para minúsculas
                'email', // Deve ser um endereço de e-mail válido
                'max:255', // Deve ter no máximo 255 caracteres
                Rule::unique(User::class)->ignore($this->user()->id), // Deve ser único na tabela de usuários, ignorando o e-mail atual do usuário
            ],
        ];
    }
}
