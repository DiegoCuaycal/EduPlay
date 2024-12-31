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
        // Cerrar sesión previa si existe
        if (Auth::check()) {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
        }

        // Validar los atributos del formulario de registro
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'admin_code' => ['nullable', 'string'],
            'agreement' => ['accepted'],
        ]);

        // Cifrar la contraseña
        $attributes['password'] = bcrypt($attributes['password']);

        // Verificar si se ingresó un código de administrador válido
        $adminCode = env('ADMIN_VERIFICATION_CODE');
        $isAdmin = isset($attributes['admin_code']) && $attributes['admin_code'] === $adminCode;

        // Si se ingresó un código pero es incorrecto, devolver con error
        if (isset($attributes['admin_code']) && !$isAdmin) {
            return back()->withErrors(['admin_code' => 'El código ingresado no es válido para administradores.'])->withInput();
        }

        // Asignar el rol basado en el código ingresado
        $role = $isAdmin ? 'Admin' : 'User';
        $attributes['rol'] = $isAdmin ? 1 : 2;

        // Crear el usuario
        $user = User::create($attributes);

        // Registrar logs para depuración
        \Log::info('Nuevo usuario registrado', [
            'user_id' => $user->id,
            'email' => $user->email,
        ]);

        // Asignar el rol al usuario usando Spatie Roles y Permisos
        $user->assignRole($role);

        // Borrar cualquier sesión residual que pudiera existir
        \DB::table('sessions')->where('user_id', $user->id)->delete();

        // Iniciar sesión con la nueva cuenta registrada
        Auth::login($user);

        // Mensaje de confirmación
        session()->flash('success', 'Tu cuenta ha sido creada.');

        // Redirigir al dashboard según el rol
        return $isAdmin ? redirect('/dashboard') : redirect('/dashboarduser');
    }



    public function create()
    {
        return view('session.register');
    }

    protected function registered(Request $request, $user)
    {
        return redirect('/'); // Redirige a la vista de inicio
    }
}






