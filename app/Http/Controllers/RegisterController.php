<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role; // Importa el modelo Role

class RegisterController extends Controller
{
    public function store()
{
    // Validar los atributos del formulario de registro
    $attributes = request()->validate([
        'name' => ['required', 'max:50'],
        'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
        'password' => ['required', 'min:5', 'max:20'],
        'agreement' => ['accepted']
    ]);

    // Cifrar la contraseña
    $attributes['password'] = bcrypt($attributes['password']);

    // Asignar el rol de usuario (1) por defecto al crear el usuario
    $attributes['rol'] = 1;

    // Crear el usuario
    $user = User::create($attributes);

    // Asignar el rol de usuario en tu sistema de roles (si es necesario)
    $user->assignRole('user'); // Asegúrate de que el rol 'usuario' exista

    // Iniciar sesión al usuario recién registrado
    Auth::login($user);

    // Mensaje de confirmación
    session()->flash('success', 'Tu cuenta ha sido creada.');

    // Redireccionar al dashboard
    return redirect('/dashboard');
}


    public function create()
    {
        return view('session.register'); // Ajusta la vista aquí
    }

    protected function registered(Request $request, $user)
    {
        return redirect('/'); // Redirige a la vista de inicio
    }
}




