<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AyudaController extends Controller
{
    //

    public function index()
    {
     
        // Pasar las pruebas a la vista del dashboard
        return view('Ayuda.ayudaProfe');
    }
}
