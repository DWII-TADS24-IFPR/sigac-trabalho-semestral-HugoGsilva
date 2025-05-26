@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Criar Nova Turma</h1>
@endsection

@section('content')
  <form action="{{ route('admin.turmas.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label for="nome" class="block font-medium">Nome da Turma</label>
      <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required
             class="w-full border-gray-300 rounded-md">
      @error('nome')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="descricao" class="block font-medium">Descrição</label>
      <textarea name="descricao" id="descricao" rows="3" required
                class="w-full border-gray-300 rounded-md">{{ old('descricao') }}</textarea>
      @error('descricao')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="curso_id" class="block font-medium">Curso</label>
      <select name="curso_id" id="curso_id" required class="w-full border-gray-300 rounded-md">
        <option value="">-- Selecione --</option>
        @foreach($cursos as $curso)
          <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
            {{ $curso->nome }}
          </option>
        @endforeach
      </select>
      @error('curso_id')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
    <a href="{{ route('admin.turmas.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Voltar</a>
  </form>
@endsection
