<?php

namespace App\Http\Controllers;

use App\Models\ProdutoImagem;
use Illuminate\Http\Request;

class ProdutoImagemController extends Controller
{
    public function index() {
        $imagens = ProdutoImagem::all();
        return view('imagens.index', ['imagens' => $imagens]);
    }

    public function primeiraImagemPorProduto($produtoId)
    {
        $imagem = ProdutoImagem::where('PRODUTO_ID', $produtoId)->first();
        return view('imagens.show', ['imagem' => $imagem]);
    }
}
