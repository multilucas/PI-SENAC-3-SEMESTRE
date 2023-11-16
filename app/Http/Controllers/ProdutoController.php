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
            $produtos = Categoria::where('CATEGORIA_NOME', $categoria)->firstOrFail()->produtos()->with('imagens')->paginate(8);
        } else {
            // Se não, obtenha todos os produtos paginados com imagens
            $produtos = Produto::with('imagens')->paginate(8);
        }

        $categorias = Categoria::all();

        return view('produto.main', compact('produtos', 'categorias'));
    }


    public function indexNaProdutos(Request $request, $categoria = null)
    {
        // Se a categoria estiver definida, filtre os produtos por ela
        if ($categoria) {
            $produtos = Categoria::where('CATEGORIA_NOME', $categoria)->firstOrFail()->produtos()->with('imagens')->paginate(16);
        } else {
            // Se não, obtenha todos os produtos paginados com imagens
            $produtos = Produto::with('imagens')->paginate(16);
        }

        $categorias = Categoria::all();

        return view('produto.produtos', compact('produtos', 'categorias'));
    }



    public function show($id)
    {
        return view('produto.produto',['produto'=>Produto::with('imagensOrdenadas', 'categoria')->findOrFail($id), 'categorias'=> Categoria::all()]);
    }
}
