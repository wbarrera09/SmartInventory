<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Importa el trait AuthorizesRequests para autorizar solicitudes
use Illuminate\Foundation\Validation\ValidatesRequests; // Importa el trait ValidatesRequests para validar solicitudes
use Illuminate\Routing\Controller as BaseController; // Importa la clase base de controladores de Laravel

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests; // Utiliza los traits AuthorizesRequests y ValidatesRequests en este controlador

    // Este controlador proporciona funcionalidades comunes a todos los demás controladores de la aplicación, como la autorización y la validación de solicitudes.
    // Al extender la clase BaseController y usar los traits AuthorizesRequests y ValidatesRequests, este controlador hereda todas las funcionalidades asociadas con ellos.
}
