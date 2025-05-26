@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Declaração de Horas Complementares</h1>
@endsection

@section('content')
  <p>Total de horas aprovadas: <strong>{{ $totalHoras }}</strong></p>
  <a href="{{ route('declaracoes.gerar') }}"
     class="px-4 py-2 bg-blue-600 text-white rounded">
    Baixar Declaração (PDF)
  </a>
@endsection
