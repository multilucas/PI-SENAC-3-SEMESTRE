<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $table = "PEDIDO_ITEM";
    protected $primaryKey = "";//criar relacionamento de chave estrangeira
    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'PEDIDO_ID');
    }

}
