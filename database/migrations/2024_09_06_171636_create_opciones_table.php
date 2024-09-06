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
        Schema::create('opciones', function (Blueprint $table) {
            // Definimos las columnas
            $table->integer('id_opcion')->primary(); // PRIMARY KEY
            $table->integer('id_pregunta')->nullable(); // Puede ser nulo
            $table->text('texto_opcion'); // No nulo
            $table->boolean('es_correcta'); // No nulo
            
            // Si 'id_pregunta' hace referencia a otra tabla, podemos definir una clave foránea aquí
            // $table->foreign('id_pregunta')->references('id')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opciones');
    }
};

