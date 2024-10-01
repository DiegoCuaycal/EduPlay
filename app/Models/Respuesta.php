<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    // Definir los campos que se pueden llenar con asignación masiva
    protected $fillable = ['texto', 'es_correcta', 'pregunta_id'];

    // Relación: una respuesta pertenece a una pregunta
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
