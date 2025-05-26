<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: sans-serif; font-size: 14px; }
    .header { text-align: center; margin-bottom: 20px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 5px; }
  </style>
</head>
<body>
  <div class="header">
    <h2>Declaração de Horas Complementares</h2>
    <p>Emitido por SIGAC — {{ now()->format('d/m/Y') }}</p>
  </div>

  <p>Declaro que <strong>{{ $user->name }}</strong> ({{ $user->email }}) concluiu 
     <strong>{{ $totalHoras }}</strong> horas complementares aprovadas.</p>

  <table>
    <thead>
      <tr>
        <th>Data</th>
        <th>Título</th>
        <th>Horas</th>
      </tr>
    </thead>
    <tbody>
      @foreach($solicitacoes as $sol)
      <tr>
        <td>{{ $sol->created_at->format('d/m/Y') }}</td>
        <td>{{ $sol->titulo }}</td>
        <td>{{ $sol->horas }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <p style="margin-top:30px;">Assinatura: ____________________________</p>
</body>
</html>
