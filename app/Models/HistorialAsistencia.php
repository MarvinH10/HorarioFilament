<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialAsistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'asistencia_id',
        'turno_id',
        'fecha_historial_asistencia',
        'hora_entrada_historial_asistencia',
        'hora_salida_historial_asistencia',
        'es_feriado_historial_asistencia',
        'horas_trabajadas_historial_asistencia',
        'motivo_cambio_historial_asistencia',
        'fecha_hora_cambio_historial_asistencia',
        'tipo_cambio_historial_asistencia',
        'estado_historial_asistencia'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
