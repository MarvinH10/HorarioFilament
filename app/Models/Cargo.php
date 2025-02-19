<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento_id',
        'nombre_cargo',
        'estado_cargo'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }

    public function historialCargos()
    {
        return $this->hasMany(HistorialCargo::class);
    }
}
