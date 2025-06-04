<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eixo;

class EixoSeeder extends Seeder
{
    public function run()
    {
        $eixos = [
            ['nome' => 'Ciências Exatas',      'descricao' => 'Engloba cursos de exatas e engenharias'],
            ['nome' => 'Ciências Humanas',     'descricao' => 'Cursos de humanas e sociais aplicadas'],
            ['nome' => 'Saúde',                'descricao' => 'Área de ciências da saúde'],
        ];

        foreach ($eixos as $data) {
            Eixo::create($data);
        }
    }
}
