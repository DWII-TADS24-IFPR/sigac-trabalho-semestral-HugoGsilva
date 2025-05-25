@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold">Solicitações de Atividades</h1>
@endsection

@section('content')
  @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-4">
      {{ session('success') }}
    </div>
  @elseif(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-4">
      {{ session('error') }}
    </div>
  @endif

  <table class="min-w-full bg-white shadow rounded">
    <thead>
      <tr class="bg-gray-200 text-left">
        <th class="px-4 py-2">Aluno</th>
        <th class="px-4 py-2">Título</th>
        <th class="px-4 py-2">Arquivo</th>
        <th class="px-4 py-2">Data</th>
        <th class="px-4 py-2">Status</th>
        <th class="px-4 py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($solicitacoes as $sol)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $sol->user->name }}</td>
          <td class="px-4 py-2">{{ $sol->titulo }}</td>
          <td class="px-4 py-2">
            <a href="{{ asset('storage/'.$sol->arquivo) }}" target="_blank"
               class="underline text-blue-600">Download</a>
          </td>
          <td class="px-4 py-2">{{ $sol->created_at->format('d/m/Y H:i') }}</td>
          <td class="px-4 py-2 capitalize">{{ $sol->status }}</td>
          <td class="px-4 py-2 space-x-2">
            @if($sol->status === \App\Models\Solicitacao::STATUS_PENDENTE)
              <form action="{{ route('admin.solicitacoes.aprovar',$sol) }}"
                    method="POST" class="inline">
                @csrf @method('PATCH')
                <button type="submit"
                        class="px-2 py-1 bg-green-600 text-white rounded">Aprovar</button>
              </form>
              <form action="{{ route('admin.solicitacoes.rejeitar',$sol) }}"
                    method="POST" class="inline">
                @csrf @method('PATCH')
                <button type="submit"
                        class="px-2 py-1 bg-red-600 text-white rounded">Rejeitar</button>
              </form>
            @else
              <span class="text-gray-500">—</span>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    {{ $solicitacoes->links() }}
  </div>
@endsection
