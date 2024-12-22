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
        if (!Schema::hasColumn('pruebas', 'user_id')) { // Verificar si la columna ya existe
            Schema::table('pruebas', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->after('id'); // Agregar la columna user_id
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relación con la tabla users
            });
        }
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('pruebas', 'user_id')) { // Verificar si la columna existe antes de eliminarla
            Schema::table('pruebas', function (Blueprint $table) {
                $table->dropForeign(['user_id']); // Eliminar la relación
                $table->dropColumn('user_id'); // Eliminar la columna
            });
        }
    }
};

