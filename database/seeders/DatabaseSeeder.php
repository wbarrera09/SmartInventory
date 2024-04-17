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
        \App\Models\User::factory(49)->create();

        // ejecuta el seeder de categorias
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);


        // Seeder para crear un usuario específico
        $user = \App\Models\User::where('email', 'wbarrera@smartinventory.com')->first();

        if (!$user) {
            \App\Models\User::factory()->create([
                'name' => 'William Barrera',
                'email' => 'wbarrera@smartinventory.com',
                'password' => bcrypt('wbarrera'),
            ]);
        }
    }
}
// Comentar para desactivar
