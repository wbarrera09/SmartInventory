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
        // Crea la tabla 'products'
        Schema::create('products', function (Blueprint $table) {
            // Define un campo de tipo entero autoincremental como clave primaria
            $table->id();
            $table->string('description');
            $table->integer('stock');
            $table->string('location');
            $table->string('size')->nullable();
            $table->string('format')->nullable();
            $table->string('grade')->nullable();
            $table->string('input')->nullable();
            $table->string('brand');
            $table->string('model')->nullable();
            $table->string('processor')->nullable();
            $table->string('capacity')->nullable();
            $table->string('technology')->nullable();
            $table->string('status')->nullable();
            $table->string('port')->nullable();
            $table->string('comments')->nullable();

            $table->foreignId('categories_id')
                ->constrained('categories') // La clave foránea está relacionada con la tabla 'categories'
                ->cascadeOnUpdate() // Cuando se actualiza el ID en 'categories', se actualiza en 'products' también
                ->cascadeOnDelete(); // Cuando se elimina la fila de 'categories', también se eliminan las filas relacionadas en 'products'
            // Define los campos de marca de tiempo predeterminados (created_at y updated_at)
            $table->timestamps();








        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'products' si existe
        Schema::dropIfExists('products');
    }
};
