<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pruebas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Agregar la columna user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relación con la tabla users
        });
    }
    
    public function down()
    {
        Schema::table('pruebas', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Eliminar la relación
            $table->dropColumn('user_id'); // Eliminar la columna
        });
    }
    
};
