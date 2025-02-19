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
        Schema::create('horario_departamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->foreignId('turno_id')->constrained('turnos');
            $table->tinyInteger('dia_semana_horario_departamento');
            $table->boolean('es_dia_descanso_horario_departamento')->default(false);
            $table->date('fecha_inicio_vigencia_horario_departamento');
            $table->date('fecha_fin_vigencia_horario_departamento')->nullable();
            $table->string('motivo_cambio_horario_departamento', 255)->nullable();
            $table->boolean('estado_horario_departamento')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_departamentos');
    }
};
