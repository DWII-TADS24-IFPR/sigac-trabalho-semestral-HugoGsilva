<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    public function run()
    {
        $cursos = [
            [
                'nome'      => 'Engenharia de Software',
                'descricao' => 'Formação em desenvolvimento de sistemas',
            ],
            [
                'nome'      => 'Administração',
                'descricao' => 'Curso de administração de empresas',
            ],
            [
                'nome'      => 'Técnico em Enfermagem',
                'descricao' => 'Curso técnico voltado à prática de enfermagem',
            ],
        ];

        foreach ($cursos as $data) {
            Curso::create($data);
        }
    }
}
