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
        // Crea la tabla 'notifications'
        Schema::create('notifications', function (Blueprint $table) {
            // Define un campo de cadena de texto UUID como clave primaria
            $table->uuid('id')->primary();
            // Define un campo de cadena de texto para el tipo de notificación
            $table->string('type');
            // Define un campo de tipo polimórfico para la entidad notificable (polymorphic)
            $table->morphs('notifiable');
            // Define un campo de texto para los datos de la notificación
            $table->text('data');
            // Define un campo de marca de tiempo para indicar cuándo se leyó la notificación
            $table->timestamp('read_at')->nullable();
            // Define los campos de marca de tiempo predeterminados (created_at y updated_at)
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'notifications' si existe
        Schema::dropIfExists('notifications');
    }
};
