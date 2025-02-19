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
        Schema::create('historial_asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('asistencia_id')->constrained('asistencias');
            $table->foreignId('turno_id')->constrained('turnos');
            $table->date('fecha_historial_asistencia');
            $table->dateTime('hora_entrada_historial_asistencia')->nullable();
            $table->dateTime('hora_salida_historial_asistencia')->nullable();
            $table->boolean('es_feriado_historial_asistencia')->default(false);
            $table->decimal('horas_trabajadas_historial_asistencia', 4, 2)->nullable();
            $table->string('motivo_cambio_historial_asistencia', 255)->nullable();
            $table->timestamp('fecha_hora_cambio_historial_asistencia')->default(now());
            $table->enum('tipo_cambio_historial_asistencia', ['CREACION', 'MODIFICACION', 'ELIMINACION']);
            $table->boolean('estado_historial_asistencia')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_asistencias');
    }
};
