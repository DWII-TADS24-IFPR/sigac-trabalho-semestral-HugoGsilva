<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Database\Seeder;

class TurmaSeeder extends Seeder
{
    public function run()
    {
        Curso::all()->each(function($curso){
            Turma::create([
                'nome'     => $curso->nome . ' - Turma 1',
                'curso_id' => $curso->id,
            ]);
        });
    }
}
