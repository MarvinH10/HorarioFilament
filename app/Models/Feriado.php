<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_feriado',
        'nombre_feriado',
        'estado_feriado'
    ];

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
