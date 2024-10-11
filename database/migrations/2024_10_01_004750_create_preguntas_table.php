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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id(); // ID automático para la pregunta
            $table->string('texto'); // Campo para el texto de la pregunta
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Añadir columna de clave foránea en respuestas para asociarlas con preguntas
        Schema::table('respuestas', function (Blueprint $table) {
            $table->foreignId('pregunta_id')->constrained('preguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
