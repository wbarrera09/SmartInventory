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
        // Crea la tabla 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            // Define el campo de correo electrónico como clave primaria
            $table->string('email')->primary();
            // Define el campo de token
            $table->string('token');
            // Define el campo de marca de tiempo para la creación del token, que puede ser nulo
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'password_reset_tokens' si existe
        Schema::dropIfExists('password_reset_tokens');
    }
};
