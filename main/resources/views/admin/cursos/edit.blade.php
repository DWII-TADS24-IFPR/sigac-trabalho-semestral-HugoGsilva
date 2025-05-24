@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-semibold">Editar Curso</h1>
@endsection

@section('content')
    <form action="{{ route('admin.cursos.update', $curso->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nome" class="block font-medium">Nome:</label>
            <input type="text"
                   name="nome"
                   id="nome"
                   value="{{ old('nome', $curso->nome) }}"
                   required
                   class="w-full border-gray-300 rounded-md">
        </div>

        <div>
            <label for="descricao" class="block font-medium">Descrição:</label>
            <textarea name="descricao"
                      id="descricao"
                      required
                      class="w-full border-gray-300 rounded-md"
            >{{ old('descricao', $curso->descricao) }}</textarea>
        </div>

        <div>
            <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded">
                Atualizar
            </button>
            <a href="{{ route('admin.cursos.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded">
               Voltar
            </a>
        </div>
    </form>
@endsection
