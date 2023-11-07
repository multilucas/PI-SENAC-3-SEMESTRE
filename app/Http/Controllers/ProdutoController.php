<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        return view('produto.main',[ 
                'produtos' => Produto::all(),
                 'categorias' => Categoria::all()
            ]);

    }
}
