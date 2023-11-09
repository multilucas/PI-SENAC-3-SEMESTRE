<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/login', 'Auth\AuthenticatedSessionController@create')->name('login');
Route::post('/login', 'Auth\AuthenticatedSessionController@store');
Route::get('/register', 'Auth\RegisteredUserController@create');
Route::post('/register', 'Auth\RegisteredUserController@store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/adicionar-ao-carrinho/{produtoId}', [CarrinhoController::class, 'adicionarAoCarrinho'])
        ->name('adicionar-ao-carrinho');

    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');

});

require __DIR__ . '/auth.php';
