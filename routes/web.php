<?php
use App\Http\Controllers\PedidoController;
use App\Http\controllers\AuthenticatedSessionController;
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


    Route::get('/profile/enderecos/{id}', [EnderecoController::class, 'index'])->name('endereco.index');
    Route::get('/profile/enderecos', [EnderecoController::class, 'create'])->name('endereco.create');
    Route::post('/profile/enderecos/{id}', [EnderecoController::class, 'store'])->name('endereco.store');
    Route::get('/profile/enderecos/edit/{id}', [EnderecoController::class, 'edit'])->name('endereco.editar');
    Route::put('/profile/enderecos/update/{id}', [EnderecoController::class, 'update'])->name('endereco.atualizar');
    Route::get('/consultar-cep/{cep}', [EnderecoController::class, 'consultarCep'])->name('endereco.cep');



    Route::get('/adicionar-ao-carrinho/{produtoId}', [CarrinhoController::class, 'adicionarAoCarrinho'])->name('adicionar-ao-carrinho');
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::get('/carrinho/atualizar', [CarrinhoController::class, 'update'])->name('update.carrinho');
    Route::get('/carrinho/remover/{ITEM_ID}', [CarrinhoController::class, 'delete'])->name('delete.carrinho');


    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::post('/pedidos', [PedidoController::class, 'store'])->name('criar.pedido');
    Route::get('/pedidos/{id}', [PedidoController::class, 'delete'])->name('cancelar.pedido');
});

require __DIR__ . '/auth.php';
