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
        Schema::create('historial_cargos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->date('fecha_inicio_historial_cargo');
            $table->date('fecha_fin_historial_cargo')->nullable();
            $table->string('motivo_cambio_historial_cargo', 255)->nullable();
            $table->boolean('estado_historial_cargo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_cargos');
    }
};
