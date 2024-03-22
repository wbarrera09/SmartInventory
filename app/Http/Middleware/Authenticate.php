<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware; // Importa la clase base de middleware de autenticación
use Illuminate\Http\Request; // Importa la clase Request de Illuminate

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Esta función se llama cuando el usuario no está autenticado y se está accediendo a una ruta protegida.

        // Si la solicitud espera una respuesta JSON (por ejemplo, desde una API), devuelve null para indicar que no se debe realizar ninguna redirección.
        // De lo contrario, devuelve la ruta con nombre 'login', lo que redirige al usuario a la página de inicio de sesión.
        return $request->expectsJson() ? null : route('login');
    }
}
