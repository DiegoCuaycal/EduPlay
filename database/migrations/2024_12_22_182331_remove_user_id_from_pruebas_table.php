<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pruebas', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Elimina la clave foránea, si existe
            $table->dropColumn('user_id');   // Elimina la columna
        });
    }

    public function down()
    {
        Schema::table('pruebas', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Elimina la relación foránea
            $table->dropColumn('user_id'); // Elimina la columna
        });
    }

};
