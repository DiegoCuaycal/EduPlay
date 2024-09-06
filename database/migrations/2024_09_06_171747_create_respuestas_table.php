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
            $table->integer('ID_RESPUESTA')->primary();
            $table->integer('ID_PARTICIPACION')->nullable();
            $table->integer('ID_PREGUNTA')->nullable();
            $table->integer('ID_OPCION')->nullable();
            $table->text('TEXTO_RESPUESTA');
            $table->integer('TIEMPO_RESPUESTA');
            $table->timestamps(); // Si deseas agregar campos de timestamps (created_at y updated_at)
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

