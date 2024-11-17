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
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('url_token', 20)->unique();
            $table->integer('tiempo_limite')->nullable(); // Tiempo en minutos, opcional
            $table->timestamps();
        });
        // Añadir la columna de clave foránea en la tabla de preguntas
        Schema::table('preguntas', function (Blueprint $table) {
            $table->foreignId('prueba_id')->constrained('pruebas')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas');
    }
};
