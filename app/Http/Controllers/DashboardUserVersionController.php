<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\PruebaRealizada;

class DashboardUserVersionController extends Controller
{
    //
    public function index()
    {
        // Obtener las 3 pruebas más recientes
        $pruebas = Prueba::orderBy('created_at', 'desc')->take(3)->get();

        // Pasar las pruebas a la vista del dashboard
        return view('user.dashboard', compact('pruebas'));
    }

    public function dashboard()
    {
        // Obtener las 10 pruebas más recientes
        $pruebas = Prueba::latest()->take(10)->get();
        
        // Obtener todas las pruebas realizadas
        $pruebasRealizadas = PruebaRealizada::with('prueba')->get();
        
        // Pasar las pruebas creadas y realizadas a la vista del dashboard
        return view('user.dashboard', compact('pruebas', 'pruebasRealizadas'));
    }
}
