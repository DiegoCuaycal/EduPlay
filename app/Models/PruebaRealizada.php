<?php

// app/Models/PruebaRealizada.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/PruebaRealizada.php
class PruebaRealizada extends Model
{
    protected $table = 'prueba_realizadas';

    protected $fillable = ['prueba_id', 'puntaje'];

    public function prueba()
    {
        return $this->belongsTo(Prueba::class);
    }
}


