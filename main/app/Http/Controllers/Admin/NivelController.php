<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveis = Nivel::paginate(10);
        return view('admin.niveis.index', compact('niveis'));
    }

    public function create()
    {
        return view('admin.niveis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Nivel::create($request->only('nome','descricao'));

        return redirect()->route('admin.niveis.index')
            ->with('success','Nível criado com sucesso.');
    }

    public function edit(Nivel $nivel)
    {
        return view('admin.niveis.edit', compact('nivel'));
    }

    public function update(Request $request, Nivel $nivel)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $nivel->update($request->only('nome','descricao'));

        return redirect()->route('admin.niveis.index')
            ->with('success','Nível atualizado com sucesso.');
    }

    public function destroy(Nivel $nivel)
    {
        $nivel->delete();
        return back()->with('success','Nível excluído com sucesso.');
    }
}
