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
        Schema::create('historial_departamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->date('fecha_inicio_historial_departamento');
            $table->date('fecha_fin_historial_departamento')->nullable();
            $table->string('motivo_cambio_historial_departamento', 255)->nullable();
            $table->boolean('estado_historial_departamento')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_departamentos');
    }
};
