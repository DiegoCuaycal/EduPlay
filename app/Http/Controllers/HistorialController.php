<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Models\PruebaRealizada;

class HistorialController extends Controller
{
    public function index()
{
    // Verificar que el usuario esté autenticado y tenga el rol correcto
    $user = auth()->user();

    if (!$user || !$user->hasRole('User')) {
        // Redirigir al login si no tiene el rol correcto
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Obtener las 3 pruebas más recientes
    $pruebas = Prueba::orderBy('created_at', 'desc')->take(3)->get();

    // Obtener las pruebas realizadas paginadas (6 por página)
    $pruebasRealizadas = PruebaRealizada::with('prueba')
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(6);

    // Pasar las pruebas y las pruebas realizadas a la vista
    return view('user.historial', compact('pruebas', 'pruebasRealizadas'));
}


public function dashboard()
{
    // Verificar que el usuario esté autenticado y tenga el rol correcto
    $user = auth()->user();

    if (!$user || !$user->hasRole('User')) {
        // Redirigir al login si no tiene el rol correcto
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Obtener las 10 pruebas más recientes
    $pruebas = Prueba::latest()->take(10)->get();
    
    // Obtener todas las pruebas realizadas con paginación (6 por página)
    $pruebasRealizadas = PruebaRealizada::with('prueba')
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(6);
    
    // Pasar las pruebas y pruebas realizadas a la vista
    return view('user.historial', compact('pruebas', 'pruebasRealizadas'));
}

}
