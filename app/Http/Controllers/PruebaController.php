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
        // Crear la prueba
        $prueba = Prueba::create(['titulo' => $request->titulo]);
    
        // Guardar las preguntas
        foreach ($request->pregunta as $index => $preguntaTexto) {
            $pregunta = $prueba->preguntas()->create(['texto' => $preguntaTexto]);
    
            // Guardar las respuestas
            foreach ($request->input("respuesta-" . ($index + 1)) as $i => $respuestaTexto) {
                $esCorrecta = isset($request->input("correcta-" . ($index + 1))[$i + 1]);  // Usamos $i+1 porque los checkboxes empiezan en 1
                $pregunta->respuestas()->create([
                    'texto' => $respuestaTexto,
                    'es_correcta' => $esCorrecta ? 1 : 0
                ]);
            }
        }
    
        return redirect()->route('pruebas.index')->with('success', 'Prueba creada exitosamente.');
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
