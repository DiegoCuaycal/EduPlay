<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Models\PruebaRealizada;
use Illuminate\Support\Facades\Log;

class HistorialController extends Controller
{

    public function index()
    {
        // Log temporal para verificar el ID del usuario autenticado
        \Log::info('ID del usuario autenticado en index', [
            'user_id' => auth()->id(),
            'user_email' => auth()->user()->email ?? 'No Authenticated'
        ]);

        // Filtrar pruebas realizadas únicamente por el usuario autenticado
        $pruebasRealizadas = PruebaRealizada::with('prueba')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // Log para verificar las pruebas obtenidas
        \Log::info('Pruebas realizadas recuperadas en index', [
            'user_id' => auth()->id(),
            'pruebas_realizadas' => $pruebasRealizadas->pluck('id')->toArray()
        ]);

        return view('user.historial', compact('pruebasRealizadas'));
    }


    public function dashboard()
    {
        // Verificar que el usuario esté autenticado
        $user = auth()->user();

        if (!$user || !$user->hasRole('User')) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Log temporal para verificar el ID del usuario autenticado
        \Log::info('ID del usuario autenticado en dashboard', [
            'user_id' => auth()->id(),
            'user_email' => auth()->user()->email ?? 'No Authenticated'
        ]);

        // Filtrar pruebas realizadas únicamente por el usuario autenticado
        $pruebasRealizadas = PruebaRealizada::with('prueba')
            ->where('user_id', auth()->id()) // Agregar este filtro
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // Log para verificar las pruebas obtenidas
        \Log::info('Pruebas realizadas recuperadas en dashboard', [
            'user_id' => auth()->id(),
            'pruebas_realizadas' => $pruebasRealizadas->pluck('id')->toArray()
        ]);

        // Obtener las 10 pruebas más recientes
        $pruebas = Prueba::latest()->take(10)->get();

        return view('user.historial', compact('pruebas', 'pruebasRealizadas'));
    }


}
