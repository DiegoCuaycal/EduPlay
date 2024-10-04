<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $preguntas = Pregunta::with('respuestas')->get();
    return view('preguntas.index', compact('preguntas'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('preguntas.create');
    }

    // Guardar una nueva pregunta y sus respuestas en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'texto_pregunta' => 'required|string|max:255',
            'respuestas.*.texto' => 'required|string|max:255',
        ]);

        // Crear la pregunta
        $pregunta = Pregunta::create([
            'texto' => $request->input('texto_pregunta'),
        ]);

        // Crear las 4 respuestas asociadas a la pregunta
        foreach ($request->input('respuestas') as $respuestaInput) {
            Respuesta::create([
                'texto' => $respuestaInput['texto'],
                'es_correcta' => isset($respuestaInput['es_correcta']) ? true : false, // Convertir a booleano
                'pregunta_id' => $pregunta->id,
            ]);
        }

        return redirect()->route('preguntas.create')->with('success', 'Pregunta y respuestas creadas exitosamente.');
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
