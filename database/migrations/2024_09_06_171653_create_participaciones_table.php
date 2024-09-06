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
        Schema::create('participaciones', function (Blueprint $table) {
            // Definimos las columnas
            $table->integer('id_participacion')->primary(); // PRIMARY KEY
            $table->integer('id_evaluacion')->nullable(); // Puede ser nulo
            $table->string('id_usuario', 50)->nullable(); // Puede ser nulo
            $table->date('fecha_participacion'); // No nulo
            $table->integer('puntaje_total'); // No nulo
            $table->integer('tiempo_total'); // No nulo

            // Si 'id_evaluacion' hace referencia a otra tabla, podemos definir una clave foránea aquí
            // $table->foreign('id_evaluacion')->references('id')->on('evaluaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participaciones');
    }
};

