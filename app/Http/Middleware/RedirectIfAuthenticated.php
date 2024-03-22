<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider; // Importa el proveedor de servicios de rutas
use Closure; // Importa la clase Closure para manejar la solicitud
use Illuminate\Http\Request; // Importa la clase Request de Illuminate
use Illuminate\Support\Facades\Auth; // Importa la fachada Auth para manejar la autenticación
use Symfony\Component\HttpFoundation\Response; // Importa la clase Response de Symfony

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Determina los guardias de autenticación a considerar.
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Verifica si el usuario está autenticado utilizando el guardia específico.
            if (Auth::guard($guard)->check()) {
                // Si el usuario está autenticado, redirige al usuario a la ubicación definida en RouteServiceProvider::HOME.
                return redirect(RouteServiceProvider::HOME);
            }
        }

        // Si el usuario no está autenticado, continúa con la solicitud normal.
        return $next($request);
    }
}
