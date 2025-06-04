<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
            EixoSeeder::class,
            NivelSeeder::class,
        ]);
        
        $this->call([
            CategoriaDocumentoSeeder::class,
        ]);

        $this->call([
            CursoSeeder::class,
        ]);

        $this->call([
            TurmaSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            SolicitacaoSeeder::class,
        ]);
    }
}
