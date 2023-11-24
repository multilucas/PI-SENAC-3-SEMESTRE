<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoStatus extends Model
{
    protected $table = 'PEDIDO_STATUS';
	protected $primaryKey = 'STATUS_ID';
	public $timestamps = false;

	protected $fillable = [
	
		'STATUS_DESC'
	];

	public function pedidos()
	{
		return $this->hasMany(PEDIDO::class, 'STATUS_ID');
	}
}
