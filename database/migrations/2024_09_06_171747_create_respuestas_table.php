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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('id_respuesta'); // Usar id como clave primaria
            $table->foreignId('id_participacion')->nullable()->constrained('participaciones')->onDelete('cascade'); // Clave foránea a 'participaciones'
            $table->foreignId('id_pregunta')->nullable()->constrained('preguntas')->onDelete('cascade'); // Clave foránea a 'preguntas'
            $table->foreignId('id_opcion')->nullable()->constrained('opciones')->onDelete('cascade'); // Clave foránea a 'opciones'
            $table->text('texto_respuesta')->nullable(); // Texto de la respuesta
            $table->integer('tiempo_respuesta'); // Tiempo en responder
            $table->timestamps(); // created_at y updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};


