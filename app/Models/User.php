<?php

namespace App\Models;

// Importaciones de traits y clases necesarias
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Definición del modelo User que extiende Authenticatable
class User extends Authenticatable
{
    // Uso de traits
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',     // Nombre del usuario
        'email',    // Correo electrónico del usuario
        'password', // Contraseña del usuario
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',        // Oculta la contraseña
        'remember_token',  // Oculta el token de recordar sesión
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Convierte el atributo 'email_verified_at' a tipo datetime
        'password' => 'hashed',             // Hashea el atributo 'password'
    ];
}
