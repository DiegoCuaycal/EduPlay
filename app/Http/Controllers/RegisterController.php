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
            'admin_code' => ['nullable', 'string'], // El campo de código de administrador es opcional
            'agreement' => ['accepted'],
        ]);

        // Cifrar la contraseña
        $attributes['password'] = bcrypt($attributes['password']);

        // Verificar si se ingresó un código de administrador válido
        $adminCode = env('ADMIN_VERIFICATION_CODE'); // Asegúrate de definir este código en tu archivo .env
        $isAdmin = isset($attributes['admin_code']) && $attributes['admin_code'] === $adminCode;

        // Asignar el rol basado en el código ingresado
        $role = $isAdmin ? 'admin' : 'user'; // Rol dinámico basado en el código
        $attributes['rol'] = $isAdmin ? 1 : 2; // 1 para admin, 2 para usuario normal

        // Crear el usuario
        $user = User::create($attributes);

        // Asignar el rol al usuario usando Spatie Roles y Permisos
        $user->assignRole($role);

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





