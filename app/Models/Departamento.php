<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'nombre_departamento',
        'descripcion_departamento',
        'estado_departamento'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }

    public function horarioDepartamentos()
    {
        return $this->hasMany(HorarioDepartamento::class);
    }

    public function historialDepartamentos()
    {
        return $this->hasMany(HistorialDepartamento::class);
    }

    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }
}
