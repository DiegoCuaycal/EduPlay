<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $primaryKey = 'id_evaluacion';
    public $timestamps = false; // Timestamps manuales, ya que tienes 'fecha_creacion' y 'fecha_modificacion'

    protected $fillable = ['id_usuario', 'titulo', 'descripcion', 'fecha_creacion', 'fecha_modificacion'];

    // Relación: Una evaluación tiene muchas preguntas
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_evaluacion', 'id_evaluacion');
    }
}

