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
            $table->integer('id_pregunta')->primary(); // Mantener INT(4)
            $table->foreignId('id_evaluacion')->nullable()->constrained('evaluaciones')->onDelete('cascade'); // Clave foránea con cascada
            $table->string('tipo_pregunta', 50); // VARCHAR(50)
            $table->string('texto_pregunta', 50); // VARCHAR(50), ajustado a la base de datos
            $table->string('imagen', 50)->nullable(); // VARCHAR(50), opcional
            $table->timestamps(); // Fechas de creación y modificación
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


