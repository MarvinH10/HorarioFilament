<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_empresa',
        'ruc_empresa',
        'estado_empresa'
    ];

    public function departamentos()
    {
        return $this->hasMany(Departamento::class);
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }

    public function Contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
