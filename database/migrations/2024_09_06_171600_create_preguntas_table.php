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
            $table->id(); // Esta línea crea la columna 'id' como clave primaria.
            $table->foreignId('id_evaluacion')->constrained('evaluaciones')->onDelete('cascade'); // Llave foránea hacia 'evaluaciones'
            $table->string('pregunta', 255); // Ejemplo de otra columna
            $table->timestamps();
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



