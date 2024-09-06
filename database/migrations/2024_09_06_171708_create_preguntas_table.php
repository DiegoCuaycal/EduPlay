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
            $table->integer('ID_PREGUNTA')->primary();
            $table->integer('ID_EVALUACION')->nullable();
            $table->string('TIPO_PREGUNTA', 50);
            $table->string('TEXTO_PREGUNTA', 50);
            $table->string('IMAGEN', 50);
            $table->timestamps(); // Si deseas agregar campos de timestamps (created_at y updated_at)
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

