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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->increments('id_evaluacion'); // Auto-incremental
            $table->string('id_usuario', 50)->nullable(); // Puede ser nulo, relacionado con otra tabla si es necesario
            $table->string('titulo', 50); // No nulo
            $table->text('descripcion'); // No nulo
            $table->timestamps(); // Esto reemplaza a 'fecha_creacion' y 'fecha_modificacion'
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};

