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
        // Crear la prueba, incluyendo el tiempo y el token URL
        $prueba = Prueba::create([
            'titulo' => $request->titulo,
            'url_token' => bin2hex(random_bytes(10)), // Generación del token único
        ]);
    
        // Guardar las preguntas
        foreach ($request->pregunta as $index => $preguntaTexto) {
            $pregunta = $prueba->preguntas()->create(['texto' => $preguntaTexto]);
    
            // Guardar las respuestas
            foreach ($request->input("respuesta-" . ($index + 1)) as $i => $respuestaTexto) {
                $esCorrecta = isset($request->input("correcta-" . ($index + 1))[$i + 1]);
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
    public function show($id)
{
    $prueba = Prueba::with('preguntas.respuestas')->findOrFail($id);
    return view('pruebas.show', compact('prueba'));
}

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $prueba = Prueba::with('preguntas.respuestas')->findOrFail($id);
        return view('pruebas.edit', compact('prueba'));
    }  
    public function update(Request $request, $id)
    {
        $prueba = Prueba::findOrFail($id);
        $prueba->update([
            'titulo' => $request->input('titulo'),
        ]);
    
        // Iterar sobre preguntas y actualizar
        foreach ($request->input('preguntas') as $preguntaId => $textoPregunta) {
            $pregunta = Pregunta::findOrFail($preguntaId);
            $pregunta->update(['texto' => $textoPregunta]);
    
            // Restablecer todas las respuestas como incorrectas
            $correctas = $request->input("correctas.$preguntaId", []);  // Checkboxes seleccionadas para esta pregunta
    
            foreach ($request->input('respuestas') as $respuestaId => $textoRespuesta) {
                $respuesta = Respuesta::findOrFail($respuestaId);
                $respuesta->update([
                    'texto' => $textoRespuesta,
                    'es_correcta' => in_array($respuestaId, $correctas), // Verificar si la respuesta está marcada como correcta
                ]);
            }
        }
    
        return redirect()->route('pruebas.show', $prueba->id)->with('success', 'Prueba actualizada correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function verPruebasCuadros()
    {
        $pruebas = Prueba::with('preguntas')->get();
        return view('pruebas.cuadros', compact('pruebas'));
    }

    // Controlador para el Dashboard
    public function dashboard()
    {
        // Obtén las 3 pruebas más recientes
        $pruebasCreadas = Prueba::orderBy('created_at', 'desc')->take(3)->get();

        // Pasa las pruebas a la vista del dashboard
        return view('dashboard', compact('pruebasCreadas'));
    }


}
