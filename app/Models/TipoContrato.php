<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_tipo_contrato',
        'estado_tipo_contrato'
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
