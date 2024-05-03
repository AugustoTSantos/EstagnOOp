<?php

// Importa a classe Questao do namespace App\Models
use App\Models\Questao;

// Importa a classe Factory do Laravel, necessária para criar fábricas
use Illuminate\Database\Eloquent\Factories\Factory;

// Declaração da classe da fábrica, que estende a classe Factory
class QuestaoFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed> Retorna um array associativo com os atributos do modelo e seus valores falsos.
     */
    public function definition(): array
    {
        return [
            // Define o título da questão usando o Faker para gerar uma sentença aleatória
            'que_titulo' => $this->faker->sentence,

            // Define o enunciado da questão usando o Faker para gerar um parágrafo aleatório
            'que_enunciado' => $this->faker->paragraph,

            // Define o peso da questão usando o Faker para gerar um número aleatório entre 0 e 10 com 2 casas decimais
            'que_peso' => $this->faker->randomFloat(2, 0, 10),

            // Define o ID do usuário associado à questão. O ID é gerado aleatoriamente pelo Faker entre 1 e 10.
            // Isso pode ser ajustado conforme necessário para corresponder à lógica de associação do usuário.
            'que_usu_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
