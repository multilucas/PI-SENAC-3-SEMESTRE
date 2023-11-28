<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarrinhoController extends Controller
{
    public function adicionarAoCarrinho(Request $request, $produtoId)
    {
        $enderecos = auth()->user()->endereco;

        $categorias = Categoria::all();
        if (auth()->check()) {
            $user = auth()->user();
            $carrinhoItem = Carrinho::where('USUARIO_ID', $user->USUARIO_ID)->where('PRODUTO_ID', $produtoId)->first();

            if ($carrinhoItem) {
                $carrinhoItem->ITEM_QTD += $request->input('quantidade_itens');
                $carrinhoItem->save();
                return redirect()->route('carrinho.index');
            } else {
                Carrinho::create([
                    'USUARIO_ID' => $user->USUARIO_ID,
                    'PRODUTO_ID' => $produtoId,
                    'ITEM_QTD' =>  $request->input('quantidade_itens')
                ]);

                return redirect()->route('carrinho.index');
            }
        } else {
            // Se o usuário não estiver autenticado, redirecione para a página de login
            return redirect()->route('login')->with('error', 'Você precisa fazer login para adicionar produtos ao carrinho.');
        }
    }


    public function index()
    {
        // Recupere os itens do carrinho do usuário autenticado
        $categorias = Categoria::all();
        $carrinhoItens = Carrinho::with('produto.imagens')->where('USUARIO_ID', auth()->user()->USUARIO_ID)->get();
        $enderecos = auth()->user()->endereco;

        // Calcule o subtotal
        $total = $carrinhoItens->reduce(function ($carry, $item) {
            return $carry + $item->produto->PRODUTO_PRECO * $item->ITEM_QTD;
        }, 0);

        return view('carrinho.index', ['carrinhoItens' => $carrinhoItens, 'total' => $total], compact('carrinhoItens', 'categorias', 'enderecos', 'total'));
    }


    // public function removerDoCarrinho($carrinhoItemId)
    // {
    //     $carrinhoItem = Carrinho::find($carrinhoItemId);
    //     if ($carrinhoItem) {
    //         $carrinhoItem->delete();
    //     }
    //     return redirect()->route('carrinho.index')->with('success', 'Produto removido do carrinho.');
    // }


    public function delete($produto)
    {
        $enderecos = auth()->user()->endereco;

        $user = auth()->user();
        $categorias = Categoria::all();
        $item = Carrinho::where('USUARIO_ID', $user->USUARIO_ID)
            ->where('PRODUTO_ID', $produto)
            ->first();
        if ($item) {
            $item->ITEM_QTD = 0;
            $item->save();
        }

        // Busque apenas os itens do carrinho do usuário atual que têm quantidade maior que 0
        $carrinhoItens = Carrinho::where('USUARIO_ID', $user->USUARIO_ID)
            ->where('ITEM_QTD', '>', 0)
            ->get();

        $total = $this->calculateSubtotal($carrinhoItens);
        return view('carrinho.index', compact('carrinhoItens', 'categorias', 'enderecos', 'total'));
    }


    public function update(Request $request)
    {
        $enderecos = auth()->user()->endereco;

        $categorias = Categoria::all();
        $user = auth()->user();
        $item = Carrinho::where('USUARIO_ID', $user->USUARIO_ID)
            ->where('PRODUTO_ID', $request->input('produto_id'))
            ->first();

        if ($item) {
            $item->ITEM_QTD = $request->input('quantidade_itens');

            $item->save();
        }

        return Redirect::back();
    }

    public function calculateSubtotal($carrinhoItens)
{
    $total = $carrinhoItens->reduce(function ($carry, $item) {
        return $carry + $item->produto->PRODUTO_PRECO * $item->ITEM_QTD;
    }, 0);

    return $total;
}
}
