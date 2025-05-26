<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TurmaSeeder;  // ← importe aqui

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // chama primeiro o TurmaSeeder
        $this->call([
            TurmaSeeder::class,
        ]);

        // cria usuário de teste
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
