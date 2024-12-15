<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
    
        // Validar que el usuario tenga rol de 'Admin'
        if (!$user || !$user->hasRole('Admin')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }
    
        $respuestas = Respuesta::all();
        return view('respuestas.index', compact('respuestas'));
    }
    

    /**
     * Show the form for creating a new resource.
     */

     public function create()
{
    $user = auth()->user();

    // Validar que el usuario tenga rol de 'Admin'
    if (!$user || !$user->hasRole('Admin')) {
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    return view('respuestas.create');
}


    // Guardar una nueva respuesta en la base de datos

    public function store(Request $request)
{
    $user = auth()->user();

    // Validar que el usuario tenga rol de 'Admin'
    if (!$user || !$user->hasRole('Admin')) {
        auth()->logout();
        return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
    }

    // Validar los datos de la respuesta
    $request->validate([
        'texto' => 'required|string|max:255',
    ]);

    // Asegurarse de que el campo 'es_correcta' se interprete como booleano
    Respuesta::create([
        'texto' => $request->input('texto'),
        'es_correcta' => $request->has('es_correcta'), // Si el checkbox está marcado, será true; si no, false
    ]);

    return redirect()->route('respuestas.create')->with('success', 'Respuesta creada exitosamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
