<?php

namespace App\Http\Controllers;
use App\Models\Pedido;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $pedidos = Pedido::where('USUARIO_ID', $userId)->get();

        return view('pedido.index', compact('pedidos'));
    }
}
