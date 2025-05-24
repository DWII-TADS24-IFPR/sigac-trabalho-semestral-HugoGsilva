{{-- resources/views/admin/cursos/create.blade.php --}}
@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-semibold">Criar Novo Curso</h1>
@endsection

@section('content')
    <form action="{{ route('admin.cursos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>
        <button type="submit">Salvar</button>
    </form>
@endsection
