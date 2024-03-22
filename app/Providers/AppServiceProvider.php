<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Este método se utiliza para registrar servicios de la aplicación.
        // Puedes definir enlaces de contenedor (bindings), singleton, etc. aquí.
        // Por ejemplo, puedes registrar un servicio personalizado.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Este método se utiliza para arrancar (bootstrap) los servicios de la aplicación.
        // Puedes configurar eventos de arranque aquí, como la configuración de rutas, vistas, etc.
    }
}
