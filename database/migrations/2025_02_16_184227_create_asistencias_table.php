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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('turno_id')->constrained('turnos');
            $table->foreignId('feriado_id')->constrained('feriados');
            $table->date('fecha_asistencia');
            $table->dateTime('hora_entrada_asistencia')->nullable();
            $table->dateTime('hora_salida_asistencia')->nullable();
            $table->boolean('es_feriado_asistencia')->default(false);
            $table->decimal('horas_trabajadas_asistencia', 4, 2)->nullable();
            $table->string('observacion_asistencia', 255)->nullable();
            $table->boolean('estado_asistencia')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
