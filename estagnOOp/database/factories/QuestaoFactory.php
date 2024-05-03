<?php

use App\Models\Questao;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class QuestaoFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'que_titulo' => $this->faker->sentence,
            'que_enunciado' => $this->faker->paragraph,
            'que_peso' => $this->faker->randomFloat(2, 0, 10),
            // Você precisará ajustar 'que_usu_id' conforme necessário
            'que_usu_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
