<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource; // Importa la clase ProductResource del namespace especificado
use Doctrine\DBAL\Schema\Index; // Importa la clase Index de Doctrine DBAL
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Resources\Pages\CreateRecord; // Importa la clase CreateRecord del framework Filament

// Define una clase llamada CreateProduct que extiende de CreateRecord
class CreateProduct extends CreateRecord
{
    // Declara una propiedad estática llamada $resource y la inicializa con la clase ProductResource
    protected static string $resource = ProductResource::class;

    // Define un método protegido llamado getRedirectUrl que devuelve una cadena de caracteres
    protected function getRedirectUrl(): string
    {
        // Devuelve la URL de redirección a la página de índice de recursos de la clase ProductResource
        return $this->getResource()::getUrl('index');
    }
}

