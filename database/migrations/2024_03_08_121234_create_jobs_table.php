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
        // Crea la tabla 'jobs'
        Schema::create('jobs', function (Blueprint $table) {
            // Define un campo de tipo bigIncrements como clave primaria
            $table->bigIncrements('id');
            // Define un campo de tipo string para la cola de trabajo, con un índice
            $table->string('queue')->index();
            // Define un campo de tipo longText para el payload del trabajo
            $table->longText('payload');
            // Define un campo de tipo unsignedTinyInteger para el número de intentos
            $table->unsignedTinyInteger('attempts');
            // Define un campo de tipo unsignedInteger para el tiempo de reserva del trabajo, que puede ser nulo
            $table->unsignedInteger('reserved_at')->nullable();
            // Define un campo de tipo unsignedInteger para el tiempo disponible del trabajo
            $table->unsignedInteger('available_at');
            // Define un campo de tipo unsignedInteger para el tiempo de creación del trabajo
            $table->unsignedInteger('created_at');
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'jobs' si existe
        Schema::dropIfExists('jobs');
    }
};
