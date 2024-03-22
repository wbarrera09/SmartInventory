<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Retorna una nueva instancia anónima de la clase Migration
return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        // Crea la tabla 'failed_jobs'
        Schema::create('failed_jobs', function (Blueprint $table) {
            // Define un campo de identificación autoincremental
            $table->id();
            // Define un campo de UUID único para cada trabajo fallido
            $table->string('uuid')->unique();
            // Define un campo para la conexión que ejecutó el trabajo fallido
            $table->text('connection');
            // Define un campo para la cola en la que se colocó el trabajo fallido
            $table->text('queue');
            // Define un campo para el contenido del trabajo fallido
            $table->longText('payload');
            // Define un campo para la excepción generada por el trabajo fallido
            $table->longText('exception');
            // Define un campo de marca de tiempo para registrar cuándo ocurrió el trabajo fallido, utilizando la hora actual como valor predeterminado
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'failed_jobs' si existe
        Schema::dropIfExists('failed_jobs');
    }
};
