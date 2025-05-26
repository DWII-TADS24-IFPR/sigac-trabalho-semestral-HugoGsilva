@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Categorias de Documento</h1>
@endsection

@section('content')
  <div class="mb-4">
    <a href="{{ route('admin.categorias_documento.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">
      Nova Categoria
    </a>
  </div>

  <table class="min-w-full bg-white shadow rounded">
    <thead>
      <tr class="bg-gray-200 text-left">
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Nome</th>
        <th class="px-4 py-2">Descrição</th>
        <th class="px-4 py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cats as $cat)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $cat->id }}</td>
          <td class="px-4 py-2">{{ $cat->nome }}</td>
          <td class="px-4 py-2">{{ $cat->descricao }}</td>
          <td class="px-4 py-2 space-x-2">
            <a href="{{ route('admin.categorias_documento.edit', $cat) }}"
               class="underline text-blue-600">Editar</a>
            <form action="{{ route('admin.categorias_documento.destroy', $cat) }}"
                  method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit"
                      class="underline text-red-600"
                      onclick="return confirm('Confirma exclusão?')">
                Excluir
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    {{ $cats->links() }}
  </div>
@endsection
