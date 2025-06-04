<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelSeeder extends Seeder
{
    public function run()
    {
        $niveis = [
            ['nome' => 'Bacharelado',  'descricao' => 'Nível superior – bacharelado'],
            ['nome' => 'Licenciatura', 'descricao' => 'Formação para docência (licenciatura)'],
            ['nome' => 'Técnico',      'descricao' => 'Formação técnica e tecnológica'],
        ];

        foreach ($niveis as $data) {
            Nivel::create($data);
        }
    }
}
