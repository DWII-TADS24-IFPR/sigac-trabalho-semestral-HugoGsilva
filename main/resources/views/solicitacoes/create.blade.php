@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Nova Atividade Complementar</h1>
@endsection

@section('content')
  @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-4">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('solicitacoes.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-4">
    @csrf

    <div>
      <label for="titulo" class="block font-medium">Título</label>
      <input type="text" name="titulo" id="titulo"
             value="{{ old('titulo') }}"
             required
             class="w-full border-gray-300 rounded-md">
      @error('titulo')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="descricao" class="block font-medium">Descrição</label>
      <textarea name="descricao" id="descricao" rows="4"
                required
                class="w-full border-gray-300 rounded-md">{{ old('descricao') }}</textarea>
      @error('descricao')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="arquivo" class="block font-medium">Documento (PDF, JPG…)</label>
      <input type="file" name="arquivo" id="arquivo"
             required class="w-full">
      @error('arquivo')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>

      <div>
        <label for="horas" class="block font-medium">Horas:</label>
        <input type="number" name="horas" id="horas"
              value="{{ old('horas') }}" min="0"
              required class="w-24 border-gray-300 rounded-md">
        @error('horas')<p class="text-red-600">{{ $message }}</p>@enderror
      </div>

    <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded">
      Enviar Solicitação
    </button>
  </form>
@endsection

