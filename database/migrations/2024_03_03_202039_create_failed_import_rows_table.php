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
        // Crea la tabla 'failed_import_rows'
        Schema::create('failed_import_rows', function (Blueprint $table) {
            // Define un campo de tipo entero autoincremental como clave primaria
            $table->id();
            // Define un campo de tipo JSON para almacenar los datos de la fila que falló la importación
            $table->json('data');
            // Define un campo de clave externa que referencia la clave primaria de la tabla de imports y se elimina en cascada
            $table->foreignId('import_id')->constrained()->cascadeOnDelete();
            // Define un campo de texto para almacenar mensajes de error de validación (puede ser nulo)
            $table->text('validation_error')->nullable();
            // Define los campos de marca de tiempo predeterminados (created_at y updated_at)
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'failed_import_rows' si existe
        Schema::dropIfExists('failed_import_rows');
    }
};
