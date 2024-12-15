<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        // Evitar que usuarios autenticados accedan al login
        if (auth()->check()) {
            return redirect('/dashboard')->with('error', 'Ya has iniciado sesión.');
        }
    
        return view('session.login-session');
    }
    

    public function store()
    {
        // Validar los datos ingresados
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($attributes)) {
            session()->regenerate();
    
            // Verificar el rol del usuario autenticado
            $user = Auth::user();
            if ($user->hasRole('Admin')) {
                return redirect()->route('dashboard')->with(['success' => 'Bienvenido, Administrador.']);
            } elseif ($user->hasRole('User')) {
                return redirect()->route('dashboarduser')->with(['success' => 'Bienvenido, Usuario.']);
            }
    
            // Si el usuario no tiene un rol válido
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Tu cuenta no tiene un rol asignado.']);
        }
    
        // Si las credenciales son incorrectas
        return back()->withErrors(['email' => 'Correo electrónico o contraseña inválidos.']);
    }
    
    
    public function destroy()
{
    // Verificar si el usuario está autenticado antes de cerrar sesión
    if (!auth()->check()) {
        return redirect('/login')->withErrors(['error' => 'No estás autenticado.']);
    }

    Auth::logout();

    return redirect('/login')->with(['success' => 'Has cerrado sesión exitosamente.']);
}

}
