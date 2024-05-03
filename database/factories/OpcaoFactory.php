<?php

// Importa a classe Opcao do namespace App\Models
use App\Models\Opcao;

// Importa a classe Factory do Laravel, necessária para criar fábricas
use Illuminate\Database\Eloquent\Factories\Factory;

// Declaração da classe da fábrica, que estende a classe Factory
class OpcOpcaoFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed> Retorna um array associativo com os atributos do modelo e seus valores falsos.
     */
    public function definition(): array
    {
        return [
            // Define o texto da opção usando o Faker para gerar uma sentença aleatória
            'opc_texto' => $this->faker->sentence,

            // Define se a opção é uma resposta verdadeira ou falsa usando o Faker para gerar um booleano aleatório
            'opc_resposta' => $this->faker->boolean,

            // Define o ID da questão associada à opção. Pode ser um valor fixo ou gerado aleatoriamente
            // Neste exemplo, está fixo em 1, mas normalmente você usaria o Faker para gerar IDs aleatórios
            // ou lógica específica para determinar o ID.
            'opc_que_id' => 1, // ou $this->faker->numberBetween(1, 10) ou qualquer outra lógica que você tenha
        ];
    }
}
