<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horario_empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('turno_id')->constrained('turnos');
            $table->tinyInteger('dia_semana_horario_empleado');
            $table->boolean('es_dia_descanso_horario_empleado')->default(false);
            $table->date('fecha_inicio_vigencia_horario_empleado');
            $table->date('fecha_fin_vigencia_horario_empleado')->nullable();
            $table->string('motivo_cambio_horario_empleado', 255)->nullable();
            $table->boolean('estado_horario_empleado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_empleados');
    }
};
