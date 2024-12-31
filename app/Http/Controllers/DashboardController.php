<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\PruebaRealizada;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Validar que solo administradores accedan
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Obtener las 3 pruebas más recientes creadas por el usuario actual
        $pruebas = Prueba::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('dashboard', compact('pruebas'));
    }

    public function dashboard()
    {
        $user = auth()->user();

        // Validar que solo administradores accedan
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Obtener las 10 pruebas más recientes creadas por el usuario actual
        $pruebas = Prueba::where('user_id', $user->id)
            ->latest()
            ->take(10)
            ->get();

        // Obtener todas las pruebas realizadas por estudiantes, relacionadas con las pruebas del profesor actual
        $pruebasRealizadas = PruebaRealizada::whereHas('prueba', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('prueba')->get();

        return view('dashboard', compact('pruebas', 'pruebasRealizadas'));
    }
}
