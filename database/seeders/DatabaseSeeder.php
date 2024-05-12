<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Comentar para desactivar
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta el seeding de la base de datos de la aplicación.
     */
    public function run(): void
    {

        // ejecuta el seeder de categorias
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);


        // Crear roles
        Role::firstOrCreate(['name' => 'SuperAdmin']);
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Empleado']);

        // Seeder para crear un usuario específico
        $user = \App\Models\User::where('email', 'wbarrera@smartinventory.com')->first();

        if (!$user) {
            $user = \App\Models\User::factory()->create([
                'name' => 'William Barrera',
                'email' => 'wbarrera@smartinventory.com',
                'password' => bcrypt('wbarrera'),
            ]);

            // Asignar el rol de SuperAdmin al usuario
            $superAdminRole = Role::where('name', 'SuperAdmin')->first();

            // Verificar si el rol SuperAdmin existe
            if ($superAdminRole) {
                $user->assignRole($superAdminRole);
            } else {
                // Si el rol no existe, puedes crearlo aquí
                Role::create(['name' => 'SuperAdmin']);
            }
        }

        // Seeder para generar datos falsos de usuarios
        $users = \App\Models\User::factory(49)->create();

        // Asignar el rol de User a los usuarios falsos
        $userRole = Role::where('name', 'Empleado')->first();

        // Verificar si el rol User existe
        if (!$userRole) {
            // Si el rol no existe, puedes crearlo aquí
            $userRole = Role::create(['name' => 'Empleado']);
        }

        foreach ($users as $user) {
            $user->assignRole($userRole);
        }
    }
}
