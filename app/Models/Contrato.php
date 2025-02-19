<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'empresa_id',
        'tipo_contrato_id',
        'max_hora_semanales_contrato',
        'fecha_inicio_contrato',
        'fecha_fin_contrato',
        'motivo_cambio_contrato',
        'ruta_documento_contrato',
        'estado_contrato'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class);
    }
}
