@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Níveis de Ensino</h1>
@endsection

@section('content')
  <div class="mb-4">
    <a href="{{ route('admin.niveis.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">
      Novo Nível
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
      @foreach($niveis as $nivel)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $nivel->id }}</td>
          <td class="px-4 py-2">{{ $nivel->nome }}</td>
          <td class="px-4 py-2">{{ $nivel->descricao }}</td>
          <td class="px-4 py-2 space-x-2">
            <a href="{{ route('admin.niveis.edit', $nivel) }}"
               class="underline text-blue-600">Editar</a>
            <form action="{{ route('admin.niveis.destroy', $nivel) }}"
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
    {{ $niveis->links() }}
  </div>
@endsection
