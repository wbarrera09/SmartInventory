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
        // Crea la tabla 'personal_access_tokens'
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            // Define un campo de identificación autoincremental
            $table->id();
            // Define un campo polimórfico para identificar al propietario del token
            $table->morphs('tokenable');
            // Define un campo para el nombre del token
            $table->string('name');
            // Define un campo para el token, único y con una longitud de 64 caracteres
            $table->string('token', 64)->unique();
            // Define un campo para las habilidades del token, nullable (puede ser nulo)
            $table->text('abilities')->nullable();
            // Define un campo de marca de tiempo para registrar la última vez que se usó el token, nullable
            $table->timestamp('last_used_at')->nullable();
            // Define un campo de marca de tiempo para la fecha de vencimiento del token, nullable
            $table->timestamp('expires_at')->nullable();
            // Define los campos de marca de tiempo predeterminados (created_at y updated_at)
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'personal_access_tokens' si existe
        Schema::dropIfExists('personal_access_tokens');
    }
};
