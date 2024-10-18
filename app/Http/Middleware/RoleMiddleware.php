<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Verifica si el usuario tiene el rol requerido
        if ($user->hasRole($role)) {
            return $next($request);
        }

        // Si no tiene el rol, redirige a una página sin acceso
        return redirect('/');
    }
}

