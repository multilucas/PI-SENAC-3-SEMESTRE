<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('produto.main', [
            'produtos' => Produto::paginate(8),
            'categorias' => Categoria::all()
        ]);
    }
    public function showByCategory(Categoria $categoria)
    {
        $produtos = $categoria->produtos;
        $categorias = Categoria::all();

        return view('produto.main', compact('produtos', 'categorias'));
    }
}
