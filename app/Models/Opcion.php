<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;
    protected $table = 'opciones';
    protected $primaryKey = 'id_opcion';
    protected $fillable = ['texto', 'es_correcta'];

    // Relación con la pregunta
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}


