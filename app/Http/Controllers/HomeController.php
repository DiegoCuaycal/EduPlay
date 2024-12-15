<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();

        if (!$user) {
            // Si no está autenticado, redirigir al login
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión.']);
        }

        // Redirigir según el rol del usuario
        if ($user->hasRole('Admin')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('dashboarduser');
        }

        // Si no tiene un rol válido, cerrar sesión y redirigir al login
        Auth::logout();
        return redirect()->route('login')->withErrors(['error' => 'Tu cuenta no tiene un rol asignado.']);
    }
}
