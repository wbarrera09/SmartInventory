<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource; // Importa la clase ProductResource del namespace especificado
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Resources\Pages\EditRecord; // Importa la clase EditRecord del framework Filament

// Define una clase llamada EditProduct que extiende de EditRecord
class EditProduct extends EditRecord
{
    // Declara una propiedad estática llamada $resource y la inicializa con la clase ProductResource
    protected static string $resource = ProductResource::class;

    // Define un método protegido llamado getRedirectUrl que devuelve una cadena de caracteres
    protected function getRedirectUrl(): string
    {
        // Devuelve la URL de redirección a la página de índice de recursos de la clase ProductResource
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
