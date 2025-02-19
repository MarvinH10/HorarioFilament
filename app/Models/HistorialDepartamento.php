<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialDepartamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'departamento_id',
        'fecha_inicio_historial_departamento',
        'fecha_fin_historial_departamento',
        'motivo_cambio_historial_departamento',
        'estado_historial_departamento'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
