<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource; // Importa la clase CategoryResource del namespace especificado
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Resources\Pages\EditRecord; // Importa la clase EditRecord del framework Filament

// Define una clase llamada EditCategory que extiende de EditRecord
class EditCategory extends EditRecord
{
    // Declara una propiedad estática llamada $resource y la inicializa con la clase CategoryResource
    protected static string $resource = CategoryResource::class;

    // Define un método protegido llamado getRedirectUrl que devuelve una cadena de caracteres
    protected function getRedirectUrl(): string
    {
        // Devuelve la URL de redirección a la página de índice de recursos de la clase CategoryResource
        return $this->getResource()::getUrl('index');
    }

    // Define un método protegido llamado getHeaderActions que devuelve un arreglo de acciones de encabezado
    protected function getHeaderActions(): array
    {
        // Devuelve una acción de eliminación encapsulada en un arreglo
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

