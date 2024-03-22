<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Genera un nombre falso (fake).
            'name' => fake()->name(),
            // Genera una dirección de correo electrónico única y segura.
            'email' => fake()->unique()->safeEmail(),
            // Establece la fecha y hora de verificación del correo electrónico a ahora.
            'email_verified_at' => now(),
            // Establece la contraseña utilizando la contraseña actual o una nueva si aún no se ha establecido.
            'password' => static::$password ??= Hash::make('password'),
            // Genera un token de recordatorio aleatorio.
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            // Establece la fecha y hora de verificación del correo electrónico a nulo.
            'email_verified_at' => null,
        ]);
    }
}
