<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function index()
    {
        $solicitacoes = Solicitacao::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.solicitacoes.index', compact('solicitacoes'));
    }

    public function aprovar(Solicitacao $solicitacao)
    {
        $solicitacao->update(['status' => Solicitacao::STATUS_APROVADO]);
        return back()->with('success', 'Solicitação aprovada.');
    }

    public function rejeitar(Solicitacao $solicitacao)
    {
        $solicitacao->update(['status' => Solicitacao::STATUS_REJEITADO]);
        return back()->with('error', 'Solicitação rejeitada.');
    }
}
