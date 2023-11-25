<?php

namespace App\Http\Controllers\Auth;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(){
        $categorias = Categoria::all();
        return view('auth.login', compact('categorias'));
    }

    public function store(LoginRequest $request): RedirectResponse{
        $usuario = User::where('USUARIO_EMAIL', $request->USUARIO_EMAIL)->first();
        if ($usuario && Hash::check($request->USUARIO_SENHA, $usuario->USUARIO_SENHA)) {
            Auth::login($usuario);
            return redirect("/");
        } else {
            return redirect("/login")->with('error', 'Email ou senha estão errados');
        }
    }
}

