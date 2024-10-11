<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = ['titulo'];

    // Relación de una prueba con muchas preguntas
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
}
