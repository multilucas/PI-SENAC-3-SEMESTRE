<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnderecoController extends Controller
{
    public function create(Request $request): View
    {
        return view('profile.enderecos', ['endereco' => $request->usuario]);
    }

    public function store(Request $request, User $id)
    {
        Endereco::create([
            'USUARIO_ID' => $id->USUARIO_ID,
            'ENDERECO_NOME' => $request->input('ENDERECO_NOME'),
            'ENDERECO_LOGRADOURO' => $request->input('ENDERECO_LOGRADOURO'),
            'ENDERECO_NUMERO' => $request->input('ENDERECO_NUMERO'),
            'ENDERECO_COMPLEMENTO' => $request->input('ENDERECO_COMPLEMENTO'),
            'ENDERECO_CEP' => $request->input('ENDERECO_CEP'),
            'ENDERECO_CIDADE' => $request->input('ENDERECO_CIDADE'),
            'ENDERECO_ESTADO' => $request->input('ENDERECO_ESTADO')
    ]);
        return redirect("/");
    }

}
