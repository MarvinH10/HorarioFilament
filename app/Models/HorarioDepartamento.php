<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDepartamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento_id',
        'turno_id',
        'dia_semana_horario_departamento',
        'es_dia_descanso_horario_departamento',
        'fecha_inicio_vigencia_horario_departamento',
        'fecha_fin_vigencia_horario_departamento',
        'motivo_cambio_horario_departamento',
        'estado_horario_departamento'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
