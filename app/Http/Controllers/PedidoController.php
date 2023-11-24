<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\PedidoStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PedidoItem;

class PedidoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pedidos = $user->pedido;
        return view('pedido.index', compact('pedidos'));
    }

    public function store(Request $request){

        $user = Auth::id();

        $carrinho = Carrinho::where('USUARIO_ID', $user);
        $endereco = $request->ENDERECO_ID;
        $status = PedidoStatus::where('STATUS_ID', 1)->value('STATUS_ID');
        $data = today()->format('Y-m-d');

        $pedido = Pedido::create([
            'USUARIO_ID' => $user,
            'ENDERECO_ID' => $endereco,
            'STATUS_ID' => $status,
            'PEDIDO_DATA' => $data
        ]);

        
        // foreach ($carrinho as $item) {
        //     $precoProduto = ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD;
        //     dd($item);
        //     if ($precoProduto > 999) {
        //         $precoProduto = 999.99;
        //     }

            // PedidoItem::create([
            //      'PRODUTO_ID' => $item->PRODUTO_ID,
            //      'PEDIDO_ID' => $pedido->PEDIDO_ID,
            //      'ITEM_QTD' => $item->CARRINHO_QUANTIDADE,
            //      'ITEM_PRECO' => $item->CARRINHO_VALOR
            //  ]);

        //}

        return redirect(route('pedidos.index'));
    }
}
