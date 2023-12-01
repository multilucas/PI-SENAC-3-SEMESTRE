<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request, $categoria = null)
    {
        // Obtenha todos os itens do carrinho + total
        $carrinhoItems = Carrinho::all();



        // Se a categoria estiver definida, filtre os produtos por ela
        if ($categoria) {
            $produtos = Categoria::where('CATEGORIA_NOME', $categoria)->firstOrFail()->produtos()->with('imagens')->paginate(8);
        } else {
            // Se não, obtenha todos os produtos paginados com imagens
            $produtos = Produto::with('imagens')->paginate(8);
        }
        $search = $request->input('search');
        $categorias = Categoria::all();

        return view('produto.main', compact('produtos', 'categorias'));
    }


    public function indexNaProdutos(Request $request, $categoria = null)
{
    // Obtenha todos os itens do carrinho + total
    $carrinhoItems = Carrinho::all();

    // Obtenha o termo de pesquisa do request
    $search = $request->get('search');

    // Se a categoria estiver definida, filtre os produtos por ela
    if ($categoria) {
        $query = Categoria::where('CATEGORIA_NOME', $categoria)->firstOrFail()->produtos()->where('PRODUTO_ATIVO', 1)->with('imagens');
    } else {
        // Se não, obtenha todos os produtos com imagens
        $query = Produto::where('PRODUTO_ATIVO', 1)->with('imagens');
    }

    // Adicione a condição de pesquisa, se houver um termo de pesquisa
    if ($search) {
        $query->where('PRODUTO_NOME', 'like', $search . '%');
    }

    // Pagine os resultados
    $produtos = $query->paginate(16);

    $categorias = Categoria::all();

    return view('produto.produtos', compact('produtos', 'categorias'));
}



    public function show($id)
    {
        return view('produto.produto',['produto'=>Produto::with('imagensOrdenadas', 'categoria')->findOrFail($id), 'categorias'=> Categoria::all()]);
    }
}
