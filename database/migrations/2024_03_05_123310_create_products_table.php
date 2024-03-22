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
            // Define un campo de tipo string para la descripción del producto
            $table->string('description');
            // Define un campo de tipo decimal para el precio del producto con 10 dígitos en total y 2 decimales
            $table->decimal('price', 10, 2);
            // Define un campo de tipo entero para el stock del producto
            $table->integer('stock');
            // Define una clave externa que referencia la columna 'id' de la tabla 'categories'
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
