<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'location',
        'about_me',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación: Un usuario (profesor/admin) tiene muchas pruebas
     */
    public function pruebas()
    {
        return $this->hasMany(Prueba::class);
    }

    /**
     * Verifica si el usuario tiene rol de administrador
     */
    public function isAdmin()
    {
        return $this->rol === 2; // 2 para Admin
    }

    /**
     * Verifica si el usuario tiene rol de usuario normal
     */
    public function isUser()
    {
        return $this->rol === 1; // 1 para Usuario normal
    }
}

