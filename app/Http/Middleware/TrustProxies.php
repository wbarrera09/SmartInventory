<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware; // Importa la clase base de middleware para confiar en proxies
use Illuminate\Http\Request; // Importa la clase Request de Illuminate

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR | // Encabezado que contiene la dirección IP del cliente real
        Request::HEADER_X_FORWARDED_HOST | // Encabezado que contiene el host original solicitado por el cliente
        Request::HEADER_X_FORWARDED_PORT | // Encabezado que contiene el puerto al que se conectó el cliente
        Request::HEADER_X_FORWARDED_PROTO | // Encabezado que indica el protocolo utilizado por el cliente para conectarse al servidor
        Request::HEADER_X_FORWARDED_AWS_ELB; // Encabezado específico de AWS que indica la presencia de Elastic Load Balancer (ELB)

    // No se proporciona ningún método para establecer los proxies confiables ($proxies), lo que significa que se usarán los valores predeterminados configurados en la configuración de la aplicación Laravel.
}
