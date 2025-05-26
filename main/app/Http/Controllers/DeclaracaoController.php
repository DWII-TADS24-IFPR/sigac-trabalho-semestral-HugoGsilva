<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Solicitacao;
use PDF;

class DeclaracaoController extends Controller
{
    // Formulário / botão para gerar declaração
    public function index()
    {
        $totalHoras = Solicitacao::where('user_id', Auth::id())
            ->where('status', Solicitacao::STATUS_APROVADO)
            ->sum('horas');

        return view('declaracoes.index', compact('totalHoras'));
    }

    // Gera e baixa o PDF
    public function gerar()
    {
        $user = Auth::user();
        $solicitacoes = Solicitacao::where('user_id', $user->id)
            ->where('status', Solicitacao::STATUS_APROVADO)
            ->get();
        $totalHoras = $solicitacoes->sum('horas');

        // ← aqui usamos o alias PDF em vez de Pdf::loadView
        $pdf = PDF::loadView('declaracoes.pdf', compact('user','solicitacoes','totalHoras'));

        return $pdf->download("declaracao_{$user->id}.pdf");
    }
}
