<?php

// Importa a classe Prova do namespace App\Models
use App\Models\Prova;

// Importa a classe Factory do Laravel, necessária para criar fábricas
use Illuminate\Database\Eloquent\Factories\Factory;

// Declaração da classe da fábrica, que estende a classe Factory
class ProProvaFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed> Retorna um array associativo com os atributos do modelo e seus valores falsos.
     */
    public function definition(): array
    {
        return [
            // Define o nome da prova usando o Faker para gerar uma sentença aleatória
            'pro_nome' => $this->faker->sentence,

            // Define a nota da prova usando o Faker para gerar um número aleatório entre 0 e 10 com 2 casas decimais
            'pro_nota' => $this->faker->randomFloat(2, 0, 10),

            // Define o ID do usuário associado à prova. Pode ser um valor fixo ou gerado aleatoriamente
            // Neste exemplo, está fixo em 1, mas normalmente você usaria o Faker para gerar IDs aleatórios
            // ou lógica específica para determinar o ID.
            'pro_usu_id' => 1, // ou $this->faker->numberBetween(1, 10) ou qualquer outra lógica que você tenha
        ];
    }
}
