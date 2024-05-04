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
        User::factory()->create([
            'name' => 'Augusto',
            'email' => 'ats@example.com',
            'email_verified_at' => time(),
            'password' => bcrypt('123456789'),
            'usu_tipo' => TRUE
        ]);
    }
}
