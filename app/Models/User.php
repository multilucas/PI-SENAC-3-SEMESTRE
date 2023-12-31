<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "USUARIO";
    public $timestamps = false;
    protected $primaryKey = "USUARIO_ID";

    protected $fillable = [
        'USUARIO_NOME',
        'USUARIO_EMAIL',
        'USUARIO_SENHA',
        'USUARIO_CPF'
    ];
    protected $hidden = [
        'USUARIO_SENHA'
    ];

    public function pedido()
    {
        return $this->hasMany(Pedido::class, 'USUARIO_ID', 'USUARIO_ID');
    }

    public function endereco()
    {
        return $this->hasMany(Endereco::class, 'USUARIO_ID', 'USUARIO_ID');
    }
}
