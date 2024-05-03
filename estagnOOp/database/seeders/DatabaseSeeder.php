<?php

namespace Database\Seeders;

use App\Models\Exame;
use App\Models\Opcao;
use App\Models\Prova;
use App\Models\Questao;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->has(Questao::factory()->count(2, 10))
            ->has(Opcao::factory()->count(2, 5), 'questoes') // Associa as opções às questões
            ->has(Prova::factory()->count(2, 10))
            ->create();

        User::factory()->create([
            'name' => 'Augusto',
            'email' => 'ats@example.com',
            'password' => bcrypt('1234567*'),
            'email_verified_at' => time()
        ]);

    }
}
