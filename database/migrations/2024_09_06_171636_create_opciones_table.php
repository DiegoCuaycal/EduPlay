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
            $table->id('id_opcion'); // Usar id como clave primaria
            $table->foreignId('id_pregunta')->constrained('preguntas')->onDelete('cascade'); // Clave foránea a 'preguntas'
            $table->text('texto_opcion'); // Texto de la opción
            $table->boolean('es_correcta'); // Indica si la opción es correcta
            $table->timestamps(); // created_at y updated_at
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


