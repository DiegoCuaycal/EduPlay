<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prueba;

class RealizarPruebaController extends Controller
{
    public function show($id)
    {
        // Cargar la prueba y sus preguntas
        $prueba = Prueba::with('preguntas.respuestas')->findOrFail($id);

        return view('realizar', compact('prueba'));
    }
}
