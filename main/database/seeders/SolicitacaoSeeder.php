<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solicitacao;
use App\Models\User;

class SolicitacaoSeeder extends Seeder
{
    public function run()
    {

        $usuario = User::where('email', 'joao.silva@test.com')->first();

        if ($usuario) {
            Solicitacao::create([
                'user_id'   => $usuario->id,
                'titulo'    => 'Solicitação de Histórico Escolar',
                'descricao' => 'Preciso do histórico escolar completo para transferência.',
                'arquivo'   => 'historico_transf.pdf',
            ]);

            Solicitacao::create([
                'user_id'   => $usuario->id,
                'titulo'    => 'Declaração de Vínculo',
                'descricao' => 'Necessito declaração de vínculo para bolsa de estudos.',
                'arquivo'   => 'declaracao_vinculo.pdf',
                'status'    => 'aprovado', 
                'horas'     => 8,
            ]);
        }
    }
}
