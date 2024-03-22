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
        // Crea la tabla 'users'
        Schema::create('users', function (Blueprint $table) {
            // Define un campo de identificación único
            $table->id();
            // Define un campo para el nombre del usuario
            $table->string('name');
            // Define un campo para el correo electrónico del usuario y lo hace único
            $table->string('email')->unique();
            // Define un campo para la fecha y hora de verificación del correo electrónico, que puede ser nulo
            $table->timestamp('email_verified_at')->nullable();
            // Define un campo para la contraseña del usuario
            $table->string('password');
            // Define un campo para el token de recordatorio
            $table->rememberToken();
            // Define campos para las marcas de tiempo de creación y actualización del registro
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'users' si existe
        Schema::dropIfExists('users');
    }
};
