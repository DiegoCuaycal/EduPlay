<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'tiempo_limite', 'imagen', 'user_id'];

    /**
     * Relación: una prueba pertenece a un usuario (creador)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: una prueba tiene muchas preguntas
     */
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    /**
     * Relación: una prueba tiene muchas pruebas realizadas
     */
    public function pruebasRealizadas()
    {
        return $this->hasMany(PruebaRealizada::class);
    }

    /**
     * Método de boot para generar el token automáticamente al crear una prueba
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($prueba) {
            $prueba->url_token = bin2hex(random_bytes(10));
        });
    }
}

