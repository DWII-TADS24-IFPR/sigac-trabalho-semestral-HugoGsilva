<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SolicitacaoController   as AdminSolicitacaoController;
use App\Http\Controllers\Admin\RelatorioController;
use App\Http\Controllers\Admin\TurmaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NivelController;
use App\Http\Controllers\Admin\CategoriaDocumentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\DeclaracaoController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', fn() => view('welcome'));

// Dashboard (usuários autenticados e verificados)
Route::get('/dashboard', fn() => view('dashboard'))
     ->middleware(['auth','verified'])
     ->name('dashboard');

// Perfil
Route::middleware('auth')->group(function(){
    Route::get('/profile',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Submissão de solicitações (aluno)
Route::middleware('auth')->group(function(){
    Route::get('solicitacoes/create', [SolicitacaoController::class, 'create'])
         ->name('solicitacoes.create');
    Route::post('solicitacoes',       [SolicitacaoController::class, 'store'])
         ->name('solicitacoes.store');
});

// Declarações (PDF)
Route::middleware('auth')->group(function(){
    Route::get('declaracoes',     [DeclaracaoController::class,'index'])
         ->name('declaracoes.index');
    Route::get('declaracoes/pdf', [DeclaracaoController::class,'gerar'])
         ->name('declaracoes.gerar');
});

// Rotas administrativas (admin)
Route::prefix('admin')
     ->name('admin.')
     ->middleware(['auth','is_admin'])
     ->group(function(){

         // CRUD de Cursos
         Route::resource('cursos',   AdminController::class);

         // CRUD de Turmas
         Route::resource('turmas',   TurmaController::class);

         // CRUD de Usuários
         Route::resource('usuarios', UserController::class)->parameters(['usuarios' => 'user']);

         // CRUD de Níveis de Ensino
         Route::resource('niveis',   NivelController::class);

         // CRUD de Categoria de Documento
         Route::resource('categorias_documento', CategoriaDocumentoController::class);

         // Aprovação de Solicitações
         Route::get   ('solicitacoes',                             [AdminSolicitacaoController::class,'index'])
              ->name('solicitacoes.index');
         Route::patch ('solicitacoes/{solicitacao}/aprovar',      [AdminSolicitacaoController::class,'aprovar'])
              ->name('solicitacoes.aprovar');
         Route::patch ('solicitacoes/{solicitacao}/rejeitar',     [AdminSolicitacaoController::class,'rejeitar'])
              ->name('solicitacoes.rejeitar');

         // Relatórios
         Route::get  ('relatorios',         [RelatorioController::class,'index'])
              ->name('relatorios.index');
         Route::post ('relatorios/gerar',   [RelatorioController::class,'gerar'])
              ->name('relatorios.gerar');
     });

// Rotas de autenticação (login, registro, etc.)
require __DIR__.'/auth.php';
