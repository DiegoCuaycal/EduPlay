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
        Schema::create('integraciones', function (Blueprint $table) {
            // Definimos las columnas
            $table->integer('id_integracion')->primary(); // PRIMARY KEY
            $table->string('id_usuario', 50)->nullable(); // Puede ser nulo
            $table->string('plataforma', 50); // No nulo
            $table->date('fecha_integracion'); // No nulo
            
            // No se especifican claves foráneas en el SQL original, pero si existe alguna relación,
            // se puede agregar aquí.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integraciones');
    }
};
