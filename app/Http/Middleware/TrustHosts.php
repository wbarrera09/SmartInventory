<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware; // Importa la clase base de middleware para confiar en hosts

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
    public function hosts(): array
    {
        // Retorna un array con los patrones de hosts que deben ser confiados.
        // En este caso, se confían todos los subdominios de la URL de la aplicación.
        return [
                        
            // Retorna el patrón para todos los subdominios de la URL de la aplicación.
            $this->allSubdomainsOfApplicationUrl(), 
        ];
    }
}
