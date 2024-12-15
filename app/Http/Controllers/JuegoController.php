<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function jugar(Request $request)
{
    // Verificar si el usuario está autenticado
    $user = auth()->user();

    if (!$user || !$user->hasRole('User')) {
        // Si no está autenticado o no tiene el rol correcto, redirigir al login
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Validar la URL ingresada en el formulario
    $request->validate([
        'gameUrl' => 'required|url'
    ]);

    // Redirigir a la URL ingresada
    return redirect()->to($request->input('gameUrl'));
}

}
