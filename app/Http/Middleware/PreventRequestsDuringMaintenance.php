<?php

namespace App\Http\Middleware;

// Importa la clase base de middleware para prevenir solicitudes durante el modo de mantenimiento
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware; 

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
