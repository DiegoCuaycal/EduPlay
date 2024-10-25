<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prueba;
use App\Models\PruebaRealizada;

class RealizarPruebaController extends Controller
{
    public function show($id)
    {
        // Cargar la prueba y sus preguntas y respuestas
        $prueba = Prueba::with('preguntas.respuestas')->findOrFail($id);

        return view('realizar', compact('prueba'));
    }

    public function store(Request $request, $pruebaId)
    {
        // Cargar la prueba y sus preguntas
        $prueba = Prueba::with('preguntas.respuestas')->findOrFail($pruebaId);

        $puntaje = 0;

        // Calcular el puntaje
        foreach ($prueba->preguntas as $pregunta) {
            $respuestaCorrecta = $pregunta->respuestas->where('es_correcta', true)->pluck('id')->toArray();
            $respuestaSeleccionada = $request->input("respuesta_{$pregunta->id}");

            // Comparar si las respuestas seleccionadas son correctas
            if ($respuestaSeleccionada && in_array($respuestaSeleccionada, $respuestaCorrecta)) {
                $puntaje++;
            }
        }

        PruebaRealizada::create([
            'prueba_id' => $prueba->id,
            'puntaje' => $puntaje,
        ]);

        return redirect()->route('pruebas.realizadas')->with('success', 'Prueba completada con éxito.');
    }

    public function index()
    {
        $pruebasRealizadas = PruebaRealizada::with('prueba')->get();
        return view('pruebas_realizadas', compact('pruebasRealizadas'));
    }

}