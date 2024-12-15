<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\View;

class ResetController extends Controller
{
    public function create()
{
    // Verificar si el usuario ya está autenticado
    if (auth()->check()) {
        return redirect('/dashboard')->with('error', 'Ya estás autenticado.');
    }

    return view('session/reset-password/sendEmail');
}


public function sendEmail(Request $request)
{
    // Verificar si el usuario ya está autenticado
    if (auth()->check()) {
        return redirect('/dashboard')->with('error', 'Ya estás autenticado.');
    }

    if (env('IS_DEMO')) {
        return redirect()->back()->withErrors(['msg2' => 'Estás en una versión de demostración, no puedes recuperar tu contraseña.']);
    }

    // Validar el correo electrónico
    $request->validate(['email' => 'required|email']);

    // Enviar el enlace de restablecimiento
    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['success' => __($status)])
        : back()->withErrors(['email' => __($status)]);
}

public function resetPass($token)
{
    // Verificar si el usuario ya está autenticado
    if (auth()->check()) {
        return redirect('/dashboard')->with('error', 'Ya estás autenticado.');
    }

    return view('session/reset-password/resetPassword', ['token' => $token]);
}

}
