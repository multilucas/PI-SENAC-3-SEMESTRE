<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;
    protected $table = "CARRINHO_ITEM";

    public $timestamps = false;
    protected $fillable = [
            'USUARIO_ID',
            'PRODUTO_ID',
            'ITEM_QTD'
        ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }
}