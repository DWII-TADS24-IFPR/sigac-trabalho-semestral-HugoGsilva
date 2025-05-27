@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Usuários</h1>
@endsection

@section('content')
  <a href="{{ route('admin.usuarios.create') }}"
     class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">
    Novo Usuário
  </a>

  <table class="min-w-full bg-white shadow rounded">
    <thead>
      <tr class="bg-gray-200">
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Nome</th>
        <th class="px-4 py-2">Email</th>
        <th class="px-4 py-2">Perfil</th>
        <th class="px-4 py-2">Turma</th>
        <th class="px-4 py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $u)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $u->id }}</td>
          <td class="px-4 py-2">{{ $u->name }}</td>
          <td class="px-4 py-2">{{ $u->email }}</td>
          <td class="px-4 py-2">{{ $u->role }}</td>
          <td class="px-4 py-2">{{ $u->turma->nome ?? '-' }}</td>
          <td class="px-4 py-2 space-x-2">
            @if($u->role !== 'admin')
              <a href="{{ route('admin.usuarios.edit', $u) }}"
                 class="underline text-blue-600">Editar</a>

              <form action="{{ route('admin.usuarios.destroy', $u) }}"
                    method="POST"
                    class="inline"
                    onsubmit="return confirm('Confirma exclusão?')">
                @csrf
                @method('DELETE')
                <button class="underline text-red-600">Excluir</button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">{{ $usuarios->links() }}</div>
@endsection
