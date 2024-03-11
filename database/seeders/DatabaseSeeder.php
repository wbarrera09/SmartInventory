<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Comentar para desactivar
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    // Comentar para desactivar
    {
         \App\Models\User::factory(3)->create();
         

         //\App\Models\User::factory()->create([
         //    'name' => 'Test User',
         //    'email' => 'test@example.com',
         // ]);
    }
}
// Comentar para desactivar