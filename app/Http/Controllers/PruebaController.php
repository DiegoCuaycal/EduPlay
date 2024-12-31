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
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Filtrar pruebas solo del usuario autenticado
        $pruebas = Prueba::where('user_id', $user->id)
            ->with('preguntas.respuestas')
            ->get();

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

        // Validar que el usuario esté autenticado y tenga el rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Validar los campos del formulario
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'tiempo_limite' => 'nullable|integer|min:1',
            'imagen' => 'nullable|image|max:2048',
            'pregunta' => 'required|array|min:1', // Aseguramos que haya al menos una pregunta
            'pregunta.*' => 'required|string|max:255', // Cada pregunta debe ser un string
        ]);

        $rutaImagen = null;

        // Si se carga una imagen, guardarla en la carpeta de almacenamiento público
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('imagenes_pruebas', 'public');
        }

        // Crear la prueba con el user_id del usuario autenticado
        $prueba = Prueba::create([
            'user_id' => $user->id,
            'titulo' => $validatedData['titulo'],
            'url_token' => bin2hex(random_bytes(10)),
            'tiempo_limite' => $validatedData['tiempo_limite'] ?? null,
            'imagen' => $rutaImagen,
        ]);

        // Guardar las preguntas y sus respuestas asociadas a la prueba
        foreach ($validatedData['pregunta'] as $index => $preguntaTexto) {
            $pregunta = $prueba->preguntas()->create(['texto' => $preguntaTexto]);

            if ($request->has("respuesta-" . ($index + 1))) {
                foreach ($request->input("respuesta-" . ($index + 1)) as $i => $respuestaTexto) {
                    $esCorrecta = isset($request->input("correcta-" . ($index + 1))[$i + 1]);
                    $pregunta->respuestas()->create([
                        'texto' => $respuestaTexto,
                        'es_correcta' => $esCorrecta ? 1 : 0,
                    ]);
                }
            }
        }

        // Retornar con un mensaje de éxito
        return redirect()->back()->with('success', 'Prueba creada exitosamente.');
    }

    public function show($id)
    {
        $prueba = Prueba::with('preguntas.respuestas')->findOrFail($id);
        return view('pruebas.show', compact('prueba'));
    }



    public function edit($id)
    {
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Filtrar pruebas por el user_id del usuario autenticado
        $prueba = Prueba::where('id', $id)
            ->where('user_id', $user->id)
            ->with('preguntas.respuestas')
            ->firstOrFail();

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

        // Filtrar pruebas por el user_id del usuario autenticado
        $prueba = Prueba::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

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

    public function verPruebasCuadros()
    {
        $user = auth()->user();

        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Filtrar pruebas solo del usuario autenticado
        $pruebas = Prueba::where('user_id', $user->id)
            ->with('preguntas')
            ->get();

        return view('pruebas.cuadros', compact('pruebas'));
    }
}
