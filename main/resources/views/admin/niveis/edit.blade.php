@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Editar Nível de Ensino</h1>
@endsection

@section('content')
  <form action="{{ route('admin.niveis.update', $nivel) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label for="nome" class="block font-medium">Nome</label>
      <input type="text" name="nome" id="nome"
             value="{{ old('nome', $nivel->nome) }}" required
             class="w-full border-gray-300 rounded-md">
      @error('nome')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="descricao" class="block font-medium">Descrição</label>
      <textarea name="descricao" id="descricao" rows="3" required
                class="w-full border-gray-300 rounded-md">{{ old('descricao', $nivel->descricao) }}</textarea>
      @error('descricao')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Atualizar</button>
    <a href="{{ route('admin.niveis.index') }}"
       class="px-4 py-2 bg-gray-500 text-white rounded">Voltar</a>
  </form>
@endsection
