<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaDocumento;

class CategoriaDocumentoSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['nome' => 'Matrícula',             'descricao' => 'Documentos para matrícula de alunos'],
            ['nome' => 'Histórico Escolar',     'descricao' => 'Solicitação de histórico escolar completo'],
            ['nome' => 'Declaração de Vínculo', 'descricao' => 'Declaração oficial de vínculo com a instituição'],
        ];

        foreach ($categorias as $data) {
            CategoriaDocumento::create($data);
        }
    }
}
