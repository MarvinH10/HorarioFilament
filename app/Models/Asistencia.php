<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'turno_id',
        'feriado_id',
        'fecha_asistencia',
        'hora_entrada_asistencia',
        'hora_salida_asistencia',
        'es_feriado_asistencia',
        'horas_trabajadas_asistencia',
        'observacion_asistencia',
        'estado_asistencia'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function feriado()
    {
        return $this->belongsTo(Feriado::class);
    }

    public function historialAsistencias()
    {
        return $this->hasMany(HistorialAsistencia::class);
    }
}
