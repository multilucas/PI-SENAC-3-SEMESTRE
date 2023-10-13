<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/categorias', [CategoriaController::class, 'index']);
