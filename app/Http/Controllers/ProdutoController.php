<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
public function index(Request $request, $categoria = null)
{
    // Se a categoria estiver definida, filtre os produtos por ela
    if ($categoria) {
        $produtos = Categoria::where('CATEGORIA_NOME', $categoria)->firstOrFail()->produtos()->paginate(8);
    } else {
        // Se não, obtenha todos os produtos paginados
        $produtos = Produto::paginate(8);
    }

    $categorias = Categoria::all();

    return view('produto.main', compact('produtos', 'categorias'));
}}
