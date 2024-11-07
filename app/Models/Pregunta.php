<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = ['texto', 'prueba_id'];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function prueba()
    {
        return $this->belongsTo(Prueba::class);
    }
}
// tests to merge lets hope