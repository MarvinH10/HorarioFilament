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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('empresa_id')->constrained('empresas');
            $table->foreignId('tipo_contrato_id')->constrained('tipo_contratos');
            $table->integer('max_hora_semanales_contrato');
            $table->date('fecha_inicio_contrato');
            $table->date('fecha_fin_contrato')->nullable();
            $table->string('motivo_cambio_contrato', 255)->nullable();
            $table->string('ruta_documento_contrato', 255)->nullable();
            $table->boolean('estado_contrato')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
