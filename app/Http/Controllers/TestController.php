<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function someFunction()
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión para acceder a esta funcionalidad.']);
        }

        $user = Auth::user();

        // Verificar si el usuario tiene el rol de administrador
        if ($user->hasRole('Admin')) {
            return 'Este usuario es un administrador.';
        }

        // Si el usuario no es administrador
        return 'Este usuario no es un administrador.';
    }
}


