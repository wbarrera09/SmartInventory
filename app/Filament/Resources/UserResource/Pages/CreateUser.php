<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource; // Importa la clase UserResource del namespace especificado
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Resources\Pages\CreateRecord; // Importa la clase CreateRecord del framework Filament

// Define una clase llamada CreateUser que extiende de CreateRecord
class CreateUser extends CreateRecord
{
    // Declara una propiedad estática llamada $resource y la inicializa con la clase UserResource
    protected static string $resource = UserResource::class;

    // Define un método protegido llamado getRedirectUrl que devuelve una cadena de caracteres
    protected function getRedirectUrl(): string
    {
        // Devuelve la URL de redirección a la página de índice de recursos de la clase UserResource
        return $this->getResource()::getUrl('index');
    }
}
