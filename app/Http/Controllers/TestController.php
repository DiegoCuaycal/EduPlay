<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Agrega esta línea


class TestController extends Controller
{
    public function someFunction()
    {
        $user = Auth::user(); // Obtiene el usuario autenticado

        if ($user && $user->hasRole('admin')) {
            return 'Este usuario es un administrador.';
        } else {
            return 'Este usuario no es un administrador.';
        }
    }
}

