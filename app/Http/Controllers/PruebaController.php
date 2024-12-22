<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use App\Exports\PruebasExport;
use Maatwebsite\Excel\Facades\Excel;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Cargar las pruebas con las preguntas y respuestas relacionadas
        $pruebas = Prueba::with('preguntas.respuestas')->get();

        return view('pruebas.index', compact('pruebas'));
    }




    public function create()
    {
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        return view('pruebas.create');
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Validación de entrada
        $request->validate([
            'titulo' => 'required',
            'tiempo_limite' => 'nullable|integer|min:1',
        ]);

        // Crear la prueba
        $prueba = Prueba::create([
            'titulo' => $request->titulo,
            'url_token' => bin2hex(random_bytes(10)),
            'tiempo_limite' => $request->tiempo_limite,
        ]);

        // Guardar las preguntas y respuestas
        foreach ($request->pregunta as $index => $preguntaTexto) {
            $pregunta = $prueba->preguntas()->create(['texto' => $preguntaTexto]);

            foreach ($request->input("respuesta-" . ($index + 1)) as $i => $respuestaTexto) {
                $esCorrecta = isset($request->input("correcta-" . ($index + 1))[$i + 1]);
                $pregunta->respuestas()->create([
                    'texto' => $respuestaTexto,
                    'es_correcta' => $esCorrecta ? 1 : 0,
                ]);
            }
        }

        // Retornar a la misma vista con un mensaje de éxito
        return redirect()->back()->with('success', 'Prueba creada exitosamente.');
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
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        $prueba = Prueba::with('preguntas.respuestas')->findOrFail($id);

        return view('pruebas.edit', compact('prueba'));
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        $prueba = Prueba::findOrFail($id);
        $prueba->update([
            'titulo' => $request->input('titulo'),
        ]);

        foreach ($request->input('preguntas') as $preguntaId => $textoPregunta) {
            $pregunta = Pregunta::findOrFail($preguntaId);
            $pregunta->update(['texto' => $textoPregunta]);

            $correctas = $request->input("correctas.$preguntaId", []);

            foreach ($request->input('respuestas') as $respuestaId => $textoRespuesta) {
                $respuesta = Respuesta::findOrFail($respuestaId);
                $respuesta->update([
                    'texto' => $textoRespuesta,
                    'es_correcta' => in_array($respuestaId, $correctas),
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
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

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
