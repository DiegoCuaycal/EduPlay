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
            // Definimos las columnas
            $table->integer('id_evaluacion')->primary(); // PRIMARY KEY
            $table->string('id_usuario', 50)->nullable(); // Puede ser nulo
            $table->string('titulo', 50); // No nulo
            $table->text('descripcion'); // No nulo
            $table->date('fecha_creacion'); // No nulo
            $table->date('fecha_modificacion'); // No nulo
            
            // Si se requiere agregar alguna relación o constraint adicional
            // se podría incluir aquí, pero según tu SQL, no hay FK directo.
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

