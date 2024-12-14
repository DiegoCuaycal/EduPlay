<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        // Verifica el rol dinámicamente
        if (($role === 'admin' && !$user->isAdmin()) || ($role === 'user' && !$user->isUser())) {
            Auth::logout(); // Si no tiene permisos, cierra sesión
            return redirect('/login')->withErrors(['error' => 'No tienes permiso para acceder a esta página.']);
        }

        return $next($request);
    }
}



