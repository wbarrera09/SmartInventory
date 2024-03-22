<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule; // Importa la clase Schedule para definir tareas programadas
use Illuminate\Foundation\Console\Kernel as ConsoleKernel; // Importa la clase base de Kernel para la consola

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Aquí se define la programación de comandos.
        // Los comandos programados se pueden definir utilizando el objeto $schedule.

        // Por ejemplo, si se desea programar un comando "inspire" para que se ejecute cada hora:
        // $schedule->command('inspire')->hourly();

        // Sin embargo, en este caso, el comando "inspire" está comentado y no se programa para ejecutarse.
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        // Esta función se encarga de registrar los comandos disponibles en la aplicación.

        $this->load(__DIR__.'/Commands'); // Carga los comandos desde el directorio "Commands"

        require base_path('routes/console.php'); // Requiere el archivo de rutas para los comandos de consola
    }
}



