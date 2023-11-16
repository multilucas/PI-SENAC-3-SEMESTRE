<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
class ENDERECO extends Model
{
	protected $table = 'ENDERECO';
	protected $primaryKey = 'ENDERECO_ID';
	public $timestamps = false;

	protected $casts = [
		'USUARIO_ID' => 'int'
	];

	protected $fillable = [
		'USUARIO_ID',
		'ENDERECO_NOME',
		'ENDERECO_LOGRADOURO',
		'ENDERECO_NUMERO',
		'ENDERECO_COMPLEMENTO',
		'ENDERECO_CEP',
		'ENDERECO_CIDADE',
		'ENDERECO_ESTADO'
	];

	public function usuario()
	{
		return $this->belongsTo(USUARIO::class, 'USUARIO_ID');
	}

	public function pedidos()
	{
		return $this->hasMany(PEDIDO::class, 'ENDERECO_ID');
	}
}
