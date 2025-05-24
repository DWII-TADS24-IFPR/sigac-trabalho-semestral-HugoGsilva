<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Listar todos os cursos
    public function index()
    {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    // Mostrar o formulário para criar um novo curso
    public function create()
    {
        return view('admin.cursos.create');
    }

    // Salvar um novo curso
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        Curso::create($request->all());
        return redirect()->route('admin.cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    // Mostrar o formulário para editar um curso
    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    // Atualizar um curso existente
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $curso->update($request->all());
        return redirect()->route('admin.cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }

    // Deletar um curso
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('admin.cursos.index')->with('success', 'Curso deletado com sucesso!');
    }
}
