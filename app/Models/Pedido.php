<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Endereco;

class Pedido extends Model
{

    use HasFactory;
    protected $table = "PEDIDO";
    protected $primaryKey = "PEDIDO_ID";
    public $timestamps = false;

    protected $fillable = [
        'PEDIDO_ID',
        'USUARIO_ID',
        'ENDERECO_ID',
        'STATUS_ID',
        'PEDIDO_DATA'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'ENDERECO_ID');
    }

    public function pedidoStatus()
	{
		return $this->belongsTo(PedidoStatus::class, 'STATUS_ID');
	}

    public function pedidoItem()
	{
		return $this->hasOne(PedidoItem::class, 'PEDIDO_ID');
	}
}
