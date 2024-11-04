<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Rota de login (fora do middleware `auth`)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Rota do dashboard, acessível apenas por usuários autenticados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DocumentController::class, 'index'])->name('dashboard');

    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('create', [DocumentController::class, 'create'])->name('create');
        Route::post('/', [DocumentController::class, 'store'])->name('store');
        Route::get('{id}/edit', [DocumentController::class, 'edit'])->name('edit');
        Route::put('{id}', [DocumentController::class, 'update'])->name('update');
        Route::delete('{id}', [DocumentController::class, 'destroy'])->name('destroy');
        Route::get('{id}/download', [DocumentController::class, 'download'])->name('download');
    });
});

// Rotas do perfil do usuário
Route::prefix('profile')->middleware('auth')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('show');
    Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';

