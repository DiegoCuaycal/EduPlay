<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password']);

        // Crear el usuario
        $user = User::create($attributes);

        // Asignar rol de "user" al nuevo usuario
        $user->assignRole('user');  // Asegúrate de que 'user' es un rol existente en tu base de datos

        // Iniciar sesión al usuario recién registrado
        Auth::login($user);

        // Mensaje de confirmación
        session()->flash('success', 'Your account has been created.');

        // Redireccionar al dashboard
        return redirect('/dashboard');
    }
}

