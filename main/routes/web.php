<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SolicitacaoController as AdminSolicitacaoController;
use App\Http\Controllers\Admin\RelatorioController;
use App\Http\Controllers\Admin\TurmaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitacaoController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (usuários autenticados e verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Submissão de solicitações (usuário autenticado)
Route::middleware('auth')->group(function () {
    Route::get('solicitacoes/create', [SolicitacaoController::class, 'create'])
         ->name('solicitacoes.create');
    Route::post('solicitacoes',       [SolicitacaoController::class, 'store'])
         ->name('solicitacoes.store');
});

// Rotas administrativas (admin)
Route::prefix('admin')
     ->name('admin.')
     ->middleware(['auth', 'is_admin'])
     ->group(function () {
         // CRUD de Cursos
         Route::resource('cursos', AdminController::class);

         // CRUD de Turmas
         Route::resource('turmas', TurmaController::class);

         // Fluxo de aprovação de solicitações
         Route::get('solicitacoes', [AdminSolicitacaoController::class, 'index'])
              ->name('solicitacoes.index');
         Route::patch('solicitacoes/{solicitacao}/aprovar', [AdminSolicitacaoController::class, 'aprovar'])
              ->name('solicitacoes.aprovar');
         Route::patch('solicitacoes/{solicitacao}/rejeitar', [AdminSolicitacaoController::class, 'rejeitar'])
              ->name('solicitacoes.rejeitar');

         // Relatórios
         Route::get('relatorios', [RelatorioController::class, 'index'])
              ->name('relatorios.index');
         Route::post('relatorios/gerar', [RelatorioController::class, 'gerar'])
              ->name('relatorios.gerar');
     });

// Rotas de autenticação padrão (login, registro, etc.)
require __DIR__ . '/auth.php';
