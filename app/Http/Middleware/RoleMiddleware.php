<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Asegúrate de importar el modelo correcto

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Asegúrate de que el usuario es una instancia de App\Models\User
        if ($user instanceof User && $user->hasRole($role)) {
            return $next($request);
        }

        return redirect('/');
    }
}



