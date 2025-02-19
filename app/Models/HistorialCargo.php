<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'cargo_id',
        'fecha_inicio_historial_cargo',
        'fecha_fin_historial_cargo',
        'motivo_cambio_historial_cargo',
        'estado_historial_cargo'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
