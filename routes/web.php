<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

//convidados
Route::get('/', [ProdutoController::class, 'index'])->name('produtos.main');

Route::get('/login', 'Auth\AuthenticatedSessionController@create')->name('login');
Route::post('/login', 'Auth\AuthenticatedSessionController@store');

Route::get('/register', 'Auth\RegisteredUserController@create')->name('register');
Route::post('/register', 'Auth\RegisteredUserController@store');

Route::get('/produtos', [ProdutoController::class, 'indexNaProdutos'])->name('produtos');
Route::get('/produtos/{categoria?}', [ProdutoController::class, 'indexNaProdutos'])->name('produtos.categoria');
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

//autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/profile/enderecos', [EnderecoController::class, 'create'])->name('endereco.create');
    Route::post('/profile/enderecos/{id}', [EnderecoController::class, 'store'])->name('endereco.store');

    Route::get('/adicionar-ao-carrinho/{produtoId}', [CarrinhoController::class, 'adicionarAoCarrinho'])->name('adicionar-ao-carrinho');
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
});

require __DIR__ . '/auth.php';
