<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::with('curso')->paginate(10);
        return view('admin.turmas.index', compact('turmas'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('admin.turmas.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'curso_id'  => 'required|exists:cursos,id',
        ]);

        Turma::create($data);

        return redirect()
            ->route('admin.turmas.index')
            ->with('success', 'Turma criada com sucesso.');
    }

    public function edit(Turma $turma)
    {
        $cursos = Curso::all();
        return view('admin.turmas.edit', compact('turma', 'cursos'));
    }

    public function update(Request $request, Turma $turma)
    {
        $data = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'curso_id'  => 'required|exists:cursos,id',
        ]);

        $turma->update($data);

        return redirect()
            ->route('admin.turmas.index')
            ->with('success', 'Turma atualizada com sucesso.');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();
        return back()->with('success', 'Turma excluída com sucesso.');
    }
}
