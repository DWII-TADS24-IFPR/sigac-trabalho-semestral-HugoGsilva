<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Turma;

class TurmaSeeder extends Seeder
{
    public function run()
    {

        Curso::all()->each(function ($curso) {
            Turma::create([
                'nome'      => $curso->nome . ' - Turma A',
                'descricao' => 'Turma A - Turno Manhã',
                'curso_id'  => $curso->id,
            ]);

            Turma::create([
                'nome'      => $curso->nome . ' - Turma B',
                'descricao' => 'Turma B - Turno Noite',
                'curso_id'  => $curso->id,
            ]);
        });
    }
}
