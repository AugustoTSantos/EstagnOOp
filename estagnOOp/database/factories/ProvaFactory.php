<?php

use App\Models\Prova;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProProvaFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pro_nome' => $this->faker->sentence,
            'pro_nota' => $this->faker->randomFloat(2, 0, 10),
            // Você precisará ajustar 'pro_usu_id' conforme necessário
            'pro_usu_id' => 1, // ou $this->faker->numberBetween(1, 10) ou qualquer outra lógica que você tenha
        ];
    }
}
