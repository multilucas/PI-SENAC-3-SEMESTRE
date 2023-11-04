<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = "PRODUTO";
    protected $primaryKey = 'PRODUTO_CODIGO';

    public function imagem() {
        return $this->hasMany(ProdutoImagem::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function categoria() {
        return $this->belogsTo(Categoria::class, 'CATEGORIA_ID');
    }
}