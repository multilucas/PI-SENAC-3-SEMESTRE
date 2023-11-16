<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnderecoController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.enderecos', ['endereco' => $request->usuario]);
    }

    /*
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        // Atualize os campos do usuário com exceção da senha
        $user->update($request->except('USUARIO_SENHA'));

        // Verifique se a senha foi fornecida no formulário
        if ($request->has('USUARIO_SENHA')) {
            // Se a senha foi fornecida, faça o hash dela e atualize
            $user->USUARIO_SENHA = Hash::make($request->input('USUARIO_SENHA'));
            $user->save();
        }

        return redirect("/");
    }
    */
}
