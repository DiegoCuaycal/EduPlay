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
        Schema::create('reportes', function (Blueprint $table) {
            $table->integer('ID_REPORTE')->primary();
            $table->string('ID_USUARIO', 50)->nullable();
            $table->integer('ID_EVALUACION')->nullable();
            $table->text('DETALLES');
            $table->date('FECHA_GENERACION');
            $table->timestamps(); // Si deseas agregar campos de timestamps (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};

