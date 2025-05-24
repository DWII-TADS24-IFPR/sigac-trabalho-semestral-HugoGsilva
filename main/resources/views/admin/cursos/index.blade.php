@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-semibold">Lista de Cursos</h1>
@endsection

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.cursos.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded">Criar Novo Curso</a>
    </div>

    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Descrição</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $curso->nome }}</td>
                    <td class="px-4 py-2">{{ $curso->descricao }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.cursos.edit', $curso->id) }}"
                           class="underline text-blue-600">Editar</a>

                        <form action="{{ route('admin.cursos.destroy', $curso->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="underline text-red-600"
                                    onclick="return confirm('Confirma exclusão?')">
                                Deletar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
