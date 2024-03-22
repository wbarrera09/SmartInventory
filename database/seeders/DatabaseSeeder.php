<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Comentar para desactivar
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta el seeding de la base de datos de la aplicación.
     */
    public function run(): void
    {
        // Seeder para generar datos falsos de usuarios
        \App\Models\User::factory(3)->create();

        // Seeder para crear un usuario específico
        //\App\Models\User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        // ]);
    }
}
// Comentar para desactivar
