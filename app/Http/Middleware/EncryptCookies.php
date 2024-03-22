<?php

namespace App\Http\Middleware;

// Importa la clase base de middleware para encriptar cookies
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware; 

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
