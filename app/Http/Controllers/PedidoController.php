<?php

namespace App\Http\Controllers;
use App\Models\Pedido;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $user = auth()->user();


        $pedidos = $user->pedido;
        

        return view('pedido.index', compact('pedidos'));
    }
}
