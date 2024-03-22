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
        // Crea la tabla 'job_batches'
        Schema::create('job_batches', function (Blueprint $table) {
            // Define un campo de cadena de texto para la clave primaria
            $table->string('id')->primary();
            // Define un campo de cadena de texto para el nombre del lote de trabajos
            $table->string('name');
            // Define un campo entero para el número total de trabajos en el lote
            $table->integer('total_jobs');
            // Define un campo entero para el número de trabajos pendientes en el lote
            $table->integer('pending_jobs');
            // Define un campo entero para el número de trabajos fallidos en el lote
            $table->integer('failed_jobs');
            // Define un campo de texto largo para almacenar los IDs de trabajos fallidos
            $table->longText('failed_job_ids');
            // Define un campo de texto medio para las opciones del lote de trabajos, nullable (puede ser nulo)
            $table->mediumText('options')->nullable();
            // Define un campo entero para la marca de tiempo de cancelación del lote de trabajos, nullable
            $table->integer('cancelled_at')->nullable();
            // Define un campo entero para la marca de tiempo de creación del lote de trabajos
            $table->integer('created_at');
            // Define un campo entero para la marca de tiempo de finalización del lote de trabajos, nullable
            $table->integer('finished_at')->nullable();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'job_batches' si existe
        Schema::dropIfExists('job_batches');
    }
};
