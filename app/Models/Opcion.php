<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = 'opciones';
    protected $primaryKey = 'id_opcion';
    public $timestamps = false; // No se manejan timestamps aquí

    protected $fillable = ['id_pregunta', 'texto_opcion', 'es_correcta'];

    // Relación: Una opción pertenece a una pregunta
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'id_pregunta', 'id_pregunta');
    }
}


