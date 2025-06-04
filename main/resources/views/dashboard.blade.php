{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.app')

{{-- Se você quiser mostrar um título no cabeçalho, use esta seção --}}
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Mensagem de boas-vindas --}}
                    <div class="mb-6">
                        <p class="text-lg">{{ __("Bem-vindo ao seu painel!") }}</p>
                    </div>

                    {{-- Grid de botões para todos os usuários --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Botão: Nova Solicitação -->
                        <a href="{{ route('solicitacoes.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md 
                                  font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-600 
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                  transition ease-in-out duration-150">
                            {{ __('Nova Solicitação') }}
                        </a>

                        <!-- Botão: Ver Declarações -->
                        <a href="{{ route('declaracoes.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md 
                                  font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-600 
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                  transition ease-in-out duration-150">
                            {{ __('Ver Declarações') }}
                        </a>

                        <!-- Botão: Gerar PDF de Declaração -->
                        <a href="{{ route('declaracoes.gerar') }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md 
                                  font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-600 
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                  transition ease-in-out duração-150">
                            {{ __('Gerar PDF de Declaração') }}
                        </a>
                    </div>

                    {{-- Seção Administrativa (visível apenas com Gate/Policy “is_admin”) --}}
                    @if(auth()->user()->isAdmin())
                        <div class="mt-12">
                            <h3 class="text-xl font-medium text-gray-800 dark:text-gray-100 mb-4">
                                {{ __('Área Administrativa') }}
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <!-- Botão: Cursos -->
                                <a href="{{ route('admin.cursos.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md 
                                          font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-600 
                                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 
                                          transition ease-in-out duration-150">
                                    {{ __('Cursos') }}
                                </a>

                                <!-- Botão: Turmas -->
                                <a href="{{ route('admin.turmas.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md 
                                          font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-600 
                                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 
                                          transition ease-in-out duration-150">
                                    {{ __('Turmas') }}
                                </a>

                                <!-- Botão: Usuários -->
                                <a href="{{ route('admin.usuarios.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md 
                                          font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-600 
                                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 
                                          transition ease-in-out duration-150">
                                    {{ __('Usuários') }}
                                </a>

                                <!-- Botão: Níveis de Ensino -->
                                <a href="{{ route('admin.niveis.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md 
                                          font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-600 
                                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 
                                          transition ease-in-out duration-150">
                                    {{ __('Níveis de Ensino') }}
                                </a>

                                <!-- Botão: Categorias de Documento -->
                                <a href="{{ route('admin.categorias_documento.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md 
                                          font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-600 
                                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 
                                          transition ease-in-out duration-150">
                                    {{ __('Categorias de Documento') }}
                                </a>

                                <!-- Botão: Solicitações para Aprovar -->
                                <a href="{{ route('admin.solicitacoes.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md 
                                          font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-600 
                                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 
                                          transition ease-in-out duration-150">
                                    {{ __('Solicitações para Aprovar') }}
                                </a>

                                <!-- Botão: Relatórios -->
                                <a href="{{ route('admin.relatorios.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md 
                                          font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-600 
                                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 
                                          transition ease-in-out duration-150">
                                    {{ __('Relatórios') }}
                                </a>
                            </div>
                        </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
@endsection
