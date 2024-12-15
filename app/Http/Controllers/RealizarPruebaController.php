<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\PruebaRealizada;
class RealizarPruebaController extends Controller
{
    /* public function show($id)
    {
        // Cargar la prueba y sus preguntas y respuestas
        $prueba = Prueba::with('preguntas.respuestas')->findOrFail($id);
        return view('realizar', compact('prueba'));
    } */

    public function show($url_token)
    {
        $user = auth()->user();
    
        // Validar que el usuario tenga rol de 'User'
        if (!$user || !$user->hasRole('User')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }
    
        // Buscar la prueba usando el `url_token` como `string`
        $prueba = Prueba::where('url_token', $url_token)->firstOrFail();
    
        return view('realizar', compact('prueba'));
    }
    


    public function store(Request $request, $url_token)
{
    $user = auth()->user();

    // Validar que el usuario tenga rol de 'User'
    if (!$user || !$user->hasRole('User')) {
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Buscar la prueba usando el `url_token` como `string`
    $prueba = Prueba::with('preguntas.respuestas')->where('url_token', $url_token)->firstOrFail();

    $puntaje = 0;

    // Calcular el puntaje
    foreach ($prueba->preguntas as $pregunta) {
        $respuestaCorrecta = $pregunta->respuestas->where('es_correcta', true)->pluck('id')->toArray();
        $respuestaSeleccionada = $request->input("respuesta_{$pregunta->id}");
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

    /* public function index()
    {
        $pruebasRealizadas = PruebaRealizada::with('prueba')->get();
        return view('pruebas_realizadas', compact('pruebasRealizadas'));
    } */

    public function index()
{
    $user = auth()->user();

    // Validar que el usuario tenga rol de 'User'
    if (!$user || !$user->hasRole('User')) {
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Obtener pruebas realizadas sin duplicados, con sus detalles más recientes
    $pruebasRealizadas = PruebaRealizada::with('prueba')
        ->select('prueba_id')
        ->groupBy('prueba_id')
        ->get();

    return view('pruebas_realizadas.index', compact('pruebasRealizadas'));
}

public function showDetails($id)
{
    $user = auth()->user();

    // Validar que el usuario tenga rol de 'User'
    if (!$user || !$user->hasRole('User')) {
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Cargar todos los intentos de la prueba específica
    $intentos = PruebaRealizada::where('prueba_id', $id)->orderBy('created_at', 'desc')->get();
    $prueba = Prueba::findOrFail($id);

    return view('pruebas_realizadas.show', compact('intentos', 'prueba'));
}

}
