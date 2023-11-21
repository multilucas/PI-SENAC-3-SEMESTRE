<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    use HasFactory;
    protected $table = "PEDIDO";
    protected $primaryKey = "PEDIDO_ID";
    public $timestamps = false;
    protected $fillable = [
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
        return $this->belongsTo(Endereco::class, 'ENDE RECO_ID');
    }
}
