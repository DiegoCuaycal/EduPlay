<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\PruebaRealizada;

class DashboardController extends Controller
{
    // DashboardController.php o tu controlador actual

    public function index()
{
    $user = auth()->user();

    // Validar que solo administradores accedan
    if (!$user || !$user->hasRole('Admin')) {
        // Redirigir al login si no tiene el rol correcto
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Obtener las 3 pruebas más recientes
    $pruebas = Prueba::orderBy('created_at', 'desc')->take(3)->get();

    // Pasar las pruebas a la vista del dashboard
    return view('dashboard', compact('pruebas'));
}

public function dashboard()
{
    $user = auth()->user();

    // Validar que solo administradores accedan
    if (!$user || !$user->hasRole('Admin')) {
        // Redirigir al login si no tiene el rol correcto
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Obtener las 10 pruebas más recientes
    $pruebas = Prueba::latest()->take(10)->get();
    
    // Obtener todas las pruebas realizadas
    $pruebasRealizadas = PruebaRealizada::with('prueba')->get();
    
    // Pasar las pruebas creadas y realizadas a la vista del dashboard
    return view('dashboard', compact('pruebas', 'pruebasRealizadas'));
}


}
