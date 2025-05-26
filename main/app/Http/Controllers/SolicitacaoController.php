<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    public function create()
    {
        return view('solicitacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'    => 'required|string|max:255',
            'descricao' => 'required|string',
            'arquivo'   => 'required|file',
            'horas'     => 'required|integer|min:0',
        ]);

        $path = $request
            ->file('arquivo')
            ->store('solicitacoes', 'public');

        Solicitacao::create([
            'user_id'   => Auth::id(),
            'titulo'    => $request->titulo,
            'descricao' => $request->descricao,
            'arquivo'   => $path,
            'horas'     => $request->horas,
        ]);

        return redirect()
            ->route('solicitacoes.create')
            ->with('success','Solicitação enviada com sucesso.');
    }
}
