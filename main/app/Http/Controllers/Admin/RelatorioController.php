<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitacao;
use App\Models\Turma;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    // Exibe o formulário de seleção de turma
    public function index()
    {
        $turmas = Turma::all();
        return view('admin.relatorios.index', compact('turmas'));
    }

    // Gera os dados do gráfico
    public function gerar(Request $request)
    {
        // 1) Valida entrada
        $data = $request->validate([
            'turma_id' => 'required|exists:turmas,id',
        ]);

        // 2) Consulta: soma horas aprovadas por aluno daquela turma
        $dados = Solicitacao::selectRaw('users.name AS aluno, SUM(solicitacoes.horas) AS total_horas')
            ->join('users', 'solicitacoes.user_id', '=', 'users.id')
            ->where('solicitacoes.status', Solicitacao::STATUS_APROVADO)
            ->where('users.turma_id', $data['turma_id'])
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_horas')
            ->get();

        // 3) Busca a Turma para passar ao título da view
        $turma = Turma::findOrFail($data['turma_id']);

        // 4) Retorna view com dados prontos para o Chart.js
        return view('admin.relatorios.grafico', compact('dados', 'turma'));
    }
}
