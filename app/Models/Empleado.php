<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'departamento_id',
        'cargo_id',
        'nombre_empleado',
        'apellido_empleado',
        'documento_identidad_empleado',
        'fecha_contratacion_empleado',
        'estado_empleado'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function historialAsistencias()
    {
        return $this->hasMany(HistorialAsistencia::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function historialCargos()
    {
        return $this->hasMany(HistorialCargo::class);
    }

    public function horarioEmpleados()
    {
        return $this->hasMany(HorarioEmpleado::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function historialDepartamentos()
    {
        return $this->hasMany(HistorialDepartamento::class);
    }
}
