<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';
    protected $primaryKey = 'id_pregunta';
    public $timestamps = true; // Para manejar 'created_at' y 'updated_at'

    protected $fillable = ['id_evaluacion', 'texto_pregunta', 'tipo_pregunta', 'imagen'];

    // Relación: Una pregunta tiene muchas opciones
    public function opciones()
    {
        return $this->hasMany(Opcion::class, 'id_pregunta', 'id_pregunta');
    }

    // Relación: Una pregunta pertenece a una evaluación
    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion', 'id_evaluacion');
    }
}

