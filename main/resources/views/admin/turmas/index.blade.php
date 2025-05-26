@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Lista de Turmas</h1>
@endsection

@section('content')
  <div class="mb-4">
    <a href="{{ route('admin.turmas.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
      Nova Turma
    </a>
  </div>

  <table class="min-w-full bg-white shadow rounded">
    <thead>
      <tr class="bg-gray-200 text-left">
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Nome</th>
        <th class="px-4 py-2">Descrição</th>
        <th class="px-4 py-2">Curso</th>
        <th class="px-4 py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($turmas as $turma)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $turma->id }}</td>
          <td class="px-4 py-2">{{ $turma->nome }}</td>
          <td class="px-4 py-2">{{ $turma->descricao }}</td>
          <td class="px-4 py-2">{{ $turma->curso->nome }}</td>
          <td class="px-4 py-2 space-x-2">
            <a href="{{ route('admin.turmas.edit', $turma) }}" class="underline text-blue-600">Editar</a>
            <form action="{{ route('admin.turmas.destroy', $turma) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="underline text-red-600" onclick="return confirm('Confirma exclusão?')">
                Deletar
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    {{ $turmas->links() }}
  </div>
@endsection
