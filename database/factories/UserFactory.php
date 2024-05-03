<?php

// Namespace da fábrica
namespace Database\Factories;

// Importação da classe Factory do Laravel
use Illuminate\Database\Eloquent\Factories\Factory;

// Importação da classe Hash do Laravel para hashing de senhas
use Illuminate\Support\Facades\Hash;

// Importação da classe Str do Laravel para geração de strings aleatórias
use Illuminate\Support\Str;

/**
 * Definição da classe UserFactory que estende a classe Factory
 */
class UserFactory extends Factory
{
    /**
     * A senha atualmente usada pela fábrica.
     */
    protected static ?string $password;

    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed> Retorna um array associativo com os atributos do modelo e seus valores falsos.
     */
    public function definition(): array
    {
        return [
            // Define o nome do usuário usando o método name() do Faker
            'name' => fake()->name(),

            // Define o email do usuário usando o método unique() e safeEmail() do Faker para garantir emails únicos
            'email' => fake()->unique()->safeEmail(),

            // Define a data de verificação do email como o momento atual
            'email_verified_at' => now(),

            // Define a senha do usuário usando o método make() da classe Hash com a senha padrão 'password'
            'password' => static::$password ??= Hash::make('password'),

            // Define um token de lembrança aleatório usando o método random() da classe Str
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indica que o endereço de email do modelo deve ser não verificado.
     */
    public function unverified(): static
    {
        // Retorna o estado do modelo onde 'email_verified_at' é nulo
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
