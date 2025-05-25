<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitacaoController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (apenas para usuários autenticados e verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil - corrigido para usar ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('solicitacoes/create', [SolicitacaoController::class,'create'])
         ->name('solicitacoes.create');
    Route::post('solicitacoes',    [SolicitacaoController::class,'store'])
         ->name('solicitacoes.store');
});

// Rotas administrativas - usando AdminController
Route::prefix('admin')
     ->name('admin.')
     ->middleware(['auth', 'is_admin'])
     ->group(function () {
         Route::resource('cursos', AdminController::class);
     });

// Rotas de autenticação padrão
require __DIR__.'/auth.php';
