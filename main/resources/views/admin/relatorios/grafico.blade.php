@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">
    Horas Complementares — Turma {{ $turma->nome }}
  </h1>
@endsection

@section('content')
  <canvas id="chartHoras" width="400" height="200"></canvas>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('chartHoras').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: @json($dados->pluck('aluno')),
        datasets: [{
          label: 'Total de Horas',
          data: @json($dados->pluck('total_horas')),
        }]
      },
      options: {
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
@endsection
