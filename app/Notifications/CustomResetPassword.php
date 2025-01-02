<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Restablece tu contraseña')
            ->greeting('¡Hola!')
            ->line('Has solicitado restablecer tu contraseña. Haz clic en el botón de abajo para continuar:')
            ->action(
                'Restablecer Contraseña',
                url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->email], false))
            )
            ->line('Si no solicitaste este cambio, ignora este mensaje. Tu contraseña permanecerá segura.');
    }


}

