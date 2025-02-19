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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->string('nombre_empleado', 50);
            $table->string('apellido_empleado', 50);
            $table->string('documento_identidad_empleado', 20)->nullable();
            $table->date('fecha_contratacion_empleado');
            $table->boolean('estado_empleado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
