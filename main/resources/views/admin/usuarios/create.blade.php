@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Novo Usuário</h1>
@endsection

@section('content')
  <form action="{{ route('admin.usuarios.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label class="block">Nome</label>
      <input name="name" value="{{ old('name') }}" required
             class="w-full border rounded px-2 py-1">
      @error('name')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block">Email</label>
      <input name="email" type="email" value="{{ old('email') }}" required
             class="w-full border rounded px-2 py-1">
      @error('email')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block">Senha</label>
      <input name="password" type="password" required
             class="w-full border rounded px-2 py-1">
      @error('password')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block">Confirmar Senha</label>
      <input name="password_confirmation" type="password" required
             class="w-full border rounded px-2 py-1">
    </div>

    <div>
      <label class="block">Perfil</label>
      <select name="role" required class="w-full border rounded px-2 py-1">
        <option value="aluno" {{ old('role')=='aluno'? 'selected':'' }}>Aluno</option>
        <option value="admin" {{ old('role')=='admin'? 'selected':'' }}>Administrador</option>
      </select>
      @error('role')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block">Turma</label>
      <select name="turma_id" class="w-full border rounded px-2 py-1">
        <option value="">— Nenhuma —</option>
        @foreach($turmas as $t)
          <option value="{{ $t->id }}" {{ old('turma_id')==$t->id?'selected':'' }}>
            {{ $t->nome }}
          </option>
        @endforeach
      </select>
      @error('turma_id')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
      Salvar
    </button>
    <a href="{{ route('admin.usuarios.index') }}"
       class="px-4 py-2 bg-gray-500 text-white rounded">Voltar</a>
  </form>
@endsection
