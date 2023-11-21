<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\User;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnderecoController extends Controller
{
    public function create(User $id)
    {
        return view('profile.enderecos', [
            'categorias' => Categoria::all(),
            'user' => $id
        ]);
    }

    public function store(Request $request, User $id){
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
        return redirect(route('endereco.index', Auth::id()));
    }

    public function index(User $id){
        $enderecosUsuario = Endereco::all()->where('USUARIO_ID', $id->USUARIO_ID);
        return view('profile.enderecosIndex', [
                'enderecosUsuario' => $enderecosUsuario,
                'categorias' => Categoria::all(),
                'user' => Auth::user()
            ]);
    }

        public function edit(Endereco $id){
        $enderecoUsuario = Endereco::find($id->ENDERECO_ID);
        return view('profile.enderecoEdit', [
            'enderecoUsuario' => $enderecoUsuario,
            'categorias' => Categoria::all(),
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, Endereco $id)
    {
        $request->validate([
            'ENDERECO_NOME' => ['required'],
            'ENDERECO_LOGRADOURO' => ['required'],
            'ENDERECO_NUMERO' => ['required', 'numeric'],
            'ENDERECO_CEP' => ['required', 'max:8'],
            'ENDERECO_CIDADE' => ['required'],
            'ENDERECO_ESTADO' => ['required', 'max:2'],
        ]);
        $id->update([
            'ENDERECO_NOME' => $request->ENDERECO_NOME,
            'ENDERECO_LOGRADOURO' => $request->ENDERECO_LOGRADOURO,
            'ENDERECO_NUMERO' => $request->ENDERECO_NUMERO,
            'ENDERECO_COMPLEMENTO' => $request->ENDERECO_COMPLEMENTO,
            'ENDERECO_CEP' => $request->ENDERECO_CEP,
            'ENDERECO_CIDADE' => $request->ENDERECO_CIDADE,
            'ENDERECO_ESTADO' => $request->ENDERECO_ESTADO
        ]);
        return redirect(route('endereco.index', $id->USUARIO_ID));
    }

    

}
