<?php

namespace Database\Seeders;

// use App\Models\Movimentacao;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Gabriel',
            'email' => 'rgabriel774@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Maria',
            'email' => 'mariacarolinaours@gmail.com',
        ]);

        // Movimentacao::factory(100)->create();
    }
}
