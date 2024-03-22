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
        // Crea la tabla 'categories'
        Schema::create('categories', function (Blueprint $table) {
            // Define un campo de tipo entero autoincremental como clave primaria
            $table->id();
            // Define un campo de tipo string para la descripción de la categoría
            $table->string('description');
            // Define los campos de marca de tiempo predeterminados (created_at y updated_at)
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'categories' si existe
        Schema::dropIfExists('categories');
    }
};
