<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function jugar(Request $request)
    {
        // Validar la URL ingresada en el formulario
        $request->validate([
            'gameUrl' => 'required|url'
        ]);

        // Redirigir a la URL ingresada
        return redirect()->to($request->input('gameUrl'));
    }
}
