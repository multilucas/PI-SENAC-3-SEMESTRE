<?php

namespace App\Http\Controllers;
use App\Models\PedidoStatus;
use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PedidoItem;

class PedidoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pedidos = $user->pedido;
        $pedidoStatus = PedidoStatus::all();
        $categorias = Categoria::all();
        return view('pedido.index', compact('pedidos', 'categorias', 'pedidoStatus', 'user'));
    }

    public function store(Request $request){

        $user = Auth::id();
        $carrinho = Carrinho::all()->where('USUARIO_ID', Auth::user()->USUARIO_ID);
        $endereco = $request->ENDERECO_ID;
        $status = PedidoStatus::where('STATUS_ID', 1)->value('STATUS_ID');
        $data = today()->format('Y-m-d');

        Pedido::create([
            'USUARIO_ID' => $user,
            'ENDERECO_ID' => $endereco,
            'STATUS_ID' => $status,
            'PEDIDO_DATA' => $data
        ]);

        $pedido_id = Pedido::orderBy('PEDIDO_ID', 'desc')->first()->PEDIDO_ID;
        // Preenchendo a tabela de itens do pedido
        foreach ($carrinho as $item) {
            $precoProduto = ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD;
            $produto =  $item->produto->PRODUTO_ID;
            $quantidade = $item->ITEM_QTD;
             if ($precoProduto > 999) {
                 $precoProduto = 999.99;
             }

            PedidoItem::create([
                  'PRODUTO_ID' => $produto,
                  'PEDIDO_ID' => $pedido_id,
                  'ITEM_QTD' => $quantidade,
                  'ITEM_PRECO' => $precoProduto
              ]);
              $item->update(['ITEM_QTD' => 0]);
        }
        return redirect(route('pedidos.index'));
    }

    public function delete($id){
        $pedido = Pedido::find($id);
        $pedido->update(['STATUS_ID' => 2]);
        return redirect(route('pedidos.index'));
    }
}
