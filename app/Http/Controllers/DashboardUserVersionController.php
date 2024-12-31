<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\PruebaRealizada;

class DashboardUserVersionController extends Controller
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

        // Obtener las 3 pruebas más recientes creadas por el usuario actual
        $pruebas = Prueba::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(3)->get();

        // Pasar las pruebas a la vista del dashboard
        return view('user.dashboard', compact('pruebas'));
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

        // Obtener las 10 pruebas más recientes creadas por el usuario actual
        $pruebas = Prueba::where('user_id', $user->id)->latest()->take(10)->get();

        // Obtener todas las pruebas realizadas por el usuario actual
        $pruebasRealizadas = PruebaRealizada::with('prueba')
            ->where('user_id', $user->id)
            ->get();

        // Pasar las pruebas creadas y realizadas a la vista del dashboard
        return view('user.dashboard', compact('pruebas', 'pruebasRealizadas'));
    }


}
