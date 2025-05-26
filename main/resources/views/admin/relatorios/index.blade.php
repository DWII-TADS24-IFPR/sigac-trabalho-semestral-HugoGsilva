@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Relatórios de Horas por Turma</h1>
@endsection

@section('content')
  <form action="{{ route('admin.relatorios.gerar') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label for="turma_id" class="block font-medium">Selecione a Turma:</label>
      <select name="turma_id" id="turma_id" required
              class="w-full border-gray-300 rounded-md">
        <option value="">-- escolha --</option>
        @foreach($turmas as $t)
          <option value="{{ $t->id }}">{{ $t->nome }}</option>
        @endforeach
      </select>
      @error('turma_id')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>
    <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded">
      Gerar Gráfico
    </button>
  </form>
@endsection
