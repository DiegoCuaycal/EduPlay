<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
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
    
            // Si no tiene un rol válido, cerrar sesión y mostrar un error
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Tu cuenta no tiene un rol asignado.']);
        }
    
        return back()->withErrors(['email' => 'Correo electrónico o contraseña inválidos.']);
    }
    
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
