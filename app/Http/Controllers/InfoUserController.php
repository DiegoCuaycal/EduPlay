<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
    
        if (!$user) {
            // Si no está autenticado, redirigir al login
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión para acceder a tu perfil.']);
        }
    
        // Renderizar la vista del perfil del usuario
        return view('profile/profile');
    }
    
    public function store(Request $request)
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
    
        if (!$user) {
            // Si no está autenticado, redirigir al login
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión para actualizar tu perfil.']);
        }
    
        // Validar los datos enviados en la solicitud
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone'     => ['max:50'],
            'location' => ['max:70'],
            'about_me'    => ['max:150'],
        ]);
    
        if ($request->get('email') != Auth::user()->email) {
            if (env('IS_DEMO') && Auth::user()->id == 1) {
                return redirect()->back()->withErrors(['msg2' => 'Estás en una versión de demostración, no puedes cambiar la dirección de correo electrónico.']);
            }
        } else {
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        }
    
        // Actualizar el perfil del usuario autenticado
        User::where('id', Auth::user()->id)->update([
            'name'    => $attributes['name'],
            'email' => $attribute['email'],
            'phone'     => $attributes['phone'],
            'location' => $attributes['location'],
            'about_me'    => $attributes["about_me"],
        ]);
    
        // Redirigir al perfil con un mensaje de éxito
        return redirect('/user-profile')->with('success', 'Perfil actualizado exitosamente');
    }
    
}
