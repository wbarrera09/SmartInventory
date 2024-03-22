<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler; // Importa la clase base de manejo de excepciones
use Throwable; // Importa la clase Throwable para manejar cualquier tipo de excepción

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // Esta función se utiliza para registrar los callbacks de manejo de excepciones para la aplicación.

        // El callback reportable se utiliza para informar sobre las excepciones que ocurren durante la ejecución de la aplicación.
        $this->reportable(function (Throwable $e) {
            // Aquí se puede personalizar la lógica de manejo de excepciones.
            // En este caso, el callback está vacío, lo que significa que no se realiza ninguna acción específica cuando ocurre una excepción.
        });
    }
}
