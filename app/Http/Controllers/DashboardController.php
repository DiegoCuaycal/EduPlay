<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;

class DashboardController extends Controller
{
    // DashboardController.php o tu controlador actual

    public function index()
    {
        // Obtener las 3 pruebas más recientes
        $pruebas = Prueba::orderBy('created_at', 'desc')->take(3)->get();

        // Pasar las pruebas a la vista del dashboard
        return view('dashboard', compact('pruebas'));
    }

    public function dashboard()
    {
        // Obtener las 10 pruebas más recientes
        $pruebas = Prueba::latest()->take(10)->get();
        
        // Pasar las pruebas a la vista del dashboard
        return view('dashboard', compact('pruebas'));
    }


}
