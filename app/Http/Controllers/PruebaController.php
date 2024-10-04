<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Cargar las pruebas con las preguntas y respuestas relacionadas
    $pruebas = Prueba::with('preguntas.respuestas')->get();
    
    return view('pruebas.index', compact('pruebas'));
}



    public function create()
    {
        return view('pruebas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'preguntas.*.texto_pregunta' => 'required|string|max:255',
            'preguntas.*.respuestas.*.texto' => 'required|string|max:255',
        ]);

        // Crear la prueba
        $prueba = Prueba::create([
            'titulo' => $request->input('titulo'),
        ]);

        // Crear las preguntas y respuestas asociadas
        foreach ($request->input('preguntas') as $preguntaInput) {
            $pregunta = Pregunta::create([
                'texto' => $preguntaInput['texto_pregunta'],
                'prueba_id' => $prueba->id,
            ]);

            // Crear las respuestas asociadas a cada pregunta
            foreach ($preguntaInput['respuestas'] as $respuestaInput) {
                Respuesta::create([
                    'texto' => $respuestaInput['texto'],
                    'es_correcta' => isset($respuestaInput['es_correcta']) ? true : false,
                    'pregunta_id' => $pregunta->id,
                ]);
            }
        }

        return redirect()->route('pruebas.create')->with('success', 'Prueba creada exitosamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
