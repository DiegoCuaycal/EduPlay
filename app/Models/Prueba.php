<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = ['titulo','tiempo_limite'];

    // Relación de una prueba con muchas preguntas
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function pruebasRealizadas()
    {
        return $this->hasMany(PruebaRealizada::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($prueba) {            
            $prueba->url_token = bin2hex(random_bytes(10));

        });
    }


}
