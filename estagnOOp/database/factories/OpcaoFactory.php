<?php

use App\Models\Opcao;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OpcOpcaoFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'opc_texto' => $this->faker->sentence,
            'opc_resposta' => $this->faker->boolean,
            // Você precisará ajustar 'opc_que_id' conforme necessário
            'opc_que_id' => 1, // ou $this->faker->numberBetween(1, 10) ou qualquer outra lógica que você tenha
        ];
    }
}
