<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\PruebaRealizada;

class RealizarPruebaController extends Controller
{
    // Mostrar una prueba usando el token
    public function show($url_token)
    {
        $user = auth()->user();

        // Validar que el usuario esté autenticado y tenga el rol 'User'
        if (!$user || !$user->hasRole('User')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Buscar la prueba usando el `url_token`
        $prueba = Prueba::where('url_token', $url_token)->firstOrFail();

        return view('realizar', compact('prueba'));
    }

    // Almacenar una prueba realizada por el usuario
    public function store(Request $request, $url_token)
    {
        $user = auth()->user();
    
        // Validar que el usuario esté autenticado y tenga el rol 'User'
        if (!$user || !$user->hasRole('User')) {
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }
    
        // Buscar la prueba usando el token
        $prueba = Prueba::with('preguntas.respuestas')->where('url_token', $url_token)->firstOrFail();
    
        $puntaje = 0;
        $puntajeTotal = 0;
    
        // Calcular el puntaje
        foreach ($prueba->preguntas as $index => $pregunta) {
            $respuestaCorrecta = $pregunta->respuestas->where('es_correcta', true)->pluck('id')->toArray();
            $respuestaSeleccionada = $request->input("respuesta_{$pregunta->id}");
            $tiempoRespuesta = $request->input("tiempo_pregunta_{$index}", null);
    
            if ($respuestaSeleccionada && in_array($respuestaSeleccionada, $respuestaCorrecta)) {
                // Puntos por respuesta correcta
                $puntaje += 100;
    
                // Puntos adicionales por tiempo
                if ($tiempoRespuesta !== null) {
                    if ($tiempoRespuesta <= 15) {
                        $puntaje += 100; // Puntos adicionales por responder en menos de 15 segundos
                    } elseif ($tiempoRespuesta <= 30) {
                        $puntaje += 50; // Puntos adicionales por responder en menos de 30 segundos
                    }
                }
            }
    
            // Contar el puntaje total posible (100 por pregunta)
            $puntajeTotal += 100;
        }
    
        // Guardar la prueba realizada con el user_id
        PruebaRealizada::create([
            'prueba_id' => $prueba->id,
            'user_id' => $user->id, // ID del usuario autenticado
            'puntaje' => $puntaje,
            'puntaje_total' => $puntajeTotal, // Puntaje máximo posible
        ]);
    
        return redirect()->route('pruebas.realizadas')->with('success', 'Prueba completada con éxito.');
    }
    
    // Mostrar el historial de pruebas realizadas (solo para administradores)
    public function index()
    {
        $user = auth()->user();

        // Obtener todas las pruebas realizadas, agrupadas por prueba
        $pruebas = Prueba::with('pruebasRealizadas.user')
            ->whereHas('pruebasRealizadas', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhereHas('prueba', function ($subquery) use ($user) {
                          $subquery->where('user_id', $user->id);
                      });
            })
            ->get();

        return view('pruebas_realizadas.index', compact('pruebas'));
    }

    // Mostrar detalles de una prueba específica
    public function showDetails($id)
    {
        $user = auth()->user();
        $prueba = Prueba::with('pruebasRealizadas.user')->findOrFail($id);
        

        // Verificar permisos
        if ($prueba->user_id !== $user->id && !$prueba->pruebasRealizadas->where('user_id', $user->id)->count()) {
            abort(403, 'Acceso no autorizado.');
        }

        // Obtener intentos de la prueba ordenados por puntaje
        $intentos = $prueba->pruebasRealizadas()->orderByDesc('puntaje')->get();

        // Filtrar intentos según el rol del usuario
        $intentosFiltrados = $intentos;
        if ($user->hasRole('Admin')) {
            // Mostrar solo el intento más alto por usuario
            $intentosFiltrados = $intentos->unique('user_id');
        } elseif ($user->hasRole('User')) {
            // Mostrar solo los intentos del usuario autenticado
            $intentosFiltrados = $intentos->where('user_id', $user->id);
        }

        return view('pruebas_realizadas.show', compact('prueba', 'intentosFiltrados'));
    }
}
