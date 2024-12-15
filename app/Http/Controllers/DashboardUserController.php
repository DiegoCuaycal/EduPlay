<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prueba;

class DashboardUserController extends Controller
{
    public function dashboard()
    {
        // Verificar que el usuario esté autenticado y tenga el rol correcto
        $user = Auth::user();

        if (!$user || !$user->hasRole('User')) {
            // Si no es un usuario válido, redirigir al login con un error
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Obtener las 10 pruebas más recientes
        $pruebas = Prueba::latest()->take(10)->get();
        
        // Pasar las pruebas a la vista del dashboard
        return view('user.dashboard', compact('pruebas'));
    }
}
