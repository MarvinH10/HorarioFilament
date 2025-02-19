<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioEmpleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'turno_id',
        'dia_semana_horario_empleado',
        'es_dia_descanso_horario_empleado',
        'fecha_inicio_vigencia_horario_empleado',
        'fecha_fin_vigencia_horario_empleado',
        'motivo_cambio_horario_empleado',
        'estado_horario_empleado'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
