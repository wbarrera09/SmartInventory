<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Retorna una nueva instancia anónima de la clase Migration
return new class() extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        // Crea la tabla 'exports'
        Schema::create('exports', function (Blueprint $table) {
            // Define un campo de tipo entero autoincremental como clave primaria
            $table->id();
            // Define un campo de marca de tiempo para indicar cuándo se completó la exportación (puede ser nulo)
            $table->timestamp('completed_at')->nullable();
            // Define un campo de cadena de texto para el disco de archivo
            $table->string('file_disk');
            // Define un campo de cadena de texto para el nombre del archivo (puede ser nulo)
            $table->string('file_name')->nullable();
            // Define un campo de cadena de texto para el exportador
            $table->string('exporter');
            // Define un campo de tipo entero sin signo para el número de filas procesadas (por defecto, 0)
            $table->unsignedInteger('processed_rows')->default(0);
            // Define un campo de tipo entero sin signo para el número total de filas
            $table->unsignedInteger('total_rows');
            // Define un campo de tipo entero sin signo para el número de filas exitosas (por defecto, 0)
            $table->unsignedInteger('successful_rows')->default(0);
            // Define un campo de clave externa que referencia la clave primaria de la tabla de usuarios y se elimina en cascada
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Define los campos de marca de tiempo predeterminados (created_at y updated_at)
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'exports' si existe
        Schema::dropIfExists('exports');
    }
};
