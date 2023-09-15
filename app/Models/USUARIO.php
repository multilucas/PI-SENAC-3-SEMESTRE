<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USUARIO extends Model
{
    protected $fillable = ['USUARIO_ID', 'USUARIO_NOME', 'USUARIO_EMAIL', 'USUARIO_SENHA', 'USUARIO_CPF'];
}
