<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaDocumento;
use Illuminate\Http\Request;

class CategoriaDocumentoController extends Controller
{
    public function index()
    {
        $cats = CategoriaDocumento::paginate(10);
        return view('admin.categorias_documento.index', compact('cats'));
    }
    public function create()
    {
        return view('admin.categorias_documento.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);
        CategoriaDocumento::create($request->only('nome','descricao'));
        return redirect()->route('admin.categorias_documento.index')
            ->with('success','Categoria criada com sucesso.');
    }
    public function edit(CategoriaDocumento $categorias_documento)
    {
        return view('admin.categorias_documento.edit', [
            'cat' => $categorias_documento
        ]);
    }
    public function update(Request $request, CategoriaDocumento $categorias_documento)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);
        $categorias_documento->update($request->only('nome','descricao'));
        return redirect()->route('admin.categorias_documento.index')
            ->with('success','Categoria atualizada com sucesso.');
    }
    public function destroy(CategoriaDocumento $categorias_documento)
    {
        $categorias_documento->delete();
        return back()->with('success','Categoria excluída com sucesso.');
    }
}
