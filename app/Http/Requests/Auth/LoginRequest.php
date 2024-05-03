<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'], // O campo 'email' é obrigatório, deve ser uma string e deve ser um endereço de e-mail válido
            'password' => ['required', 'string'], // O campo 'password' é obrigatório e deve ser uma string
        ];
    }

    /**
     * Tenta autenticar as credenciais da solicitação.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited(); // Verifica se a solicitação não está limitada por taxa de requisição

        // Tenta autenticar o usuário com as credenciais fornecidas
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Se a autenticação falhar, registra o acesso para limitação por taxa de requisição
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Lança uma exceção com uma mensagem de erro indicando que a autenticação falhou
            ]);
        }

        // Limpa a limitação por taxa de requisição se a autenticação for bem-sucedida
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Garante que a solicitação de login não esteja limitada por taxa de requisição.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        // Verifica se a solicitação de login está limitada por taxa de requisição
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // Se estiver limitada, dispara um evento de Bloqueio de Acesso
        event(new Lockout($this));

        // Calcula o tempo até que o limite de taxa seja redefinido
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Lança uma exceção com uma mensagem indicando que o limite de taxa foi excedido
        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Obtém a chave de limitação por taxa para a solicitação.
     */
    public function throttleKey(): string
    {
        // Gera uma chave única para limitação por taxa com base no endereço de e-mail e no endereço IP do usuário
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
