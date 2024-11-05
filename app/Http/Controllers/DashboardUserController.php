<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;

class DashboardUserController extends Controller
{
    //
    public function dashboard()
    {
        // Obtener las 10 pruebas más recientes
        $pruebas = Prueba::latest()->take(10)->get();
        
        // Pasar las pruebas a la vista del dashboard
        return view('user.dashboard', compact('pruebas'));
    }
}
