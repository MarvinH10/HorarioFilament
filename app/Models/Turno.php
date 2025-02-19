<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_turno',
        'hora_inicio_turno',
        'hora_fin_turno',
        'estado_turno'
    ];

    public function horarioDepartamentos()
    {
        return $this->hasMany(HorarioDepartamento::class);
    }

    public function historialAsistencias()
    {
        return $this->hasMany(HistorialAsistencia::class);
    }

    public function horarioEmpleados()
    {
        return $this->hasMany(HorarioEmpleado::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
