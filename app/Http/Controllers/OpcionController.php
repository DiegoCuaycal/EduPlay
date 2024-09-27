<?php

// app/Http/Controllers/OpcionController.php
namespace App\Http\Controllers;

use App\Models\Opcion;
use Illuminate\Http\Request;

class OpcionController extends Controller
{
    public function create()
    {
        return view('opciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required|string|max:255',
            'es_correcta' => 'sometimes|boolean',
        ]);

        Opcion::create([
            'texto' => $request->input('texto'),
            'es_correcta' => $request->has('es_correcta'),
        ]);

        return redirect()->route('opciones.create')->with('success', 'Opción guardada correctamente.');
    }
}

