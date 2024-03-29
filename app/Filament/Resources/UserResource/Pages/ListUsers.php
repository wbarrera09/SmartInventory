<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource; // Importa la clase UserResource del namespace especificado
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Resources\Pages\ListRecords; // Importa la clase ListRecords del framework Filament

// Define una clase llamada ListUsers que extiende de ListRecords
class ListUsers extends ListRecords
{
    // Declara una propiedad estática llamada $resource y la inicializa con la clase UserResource
    protected static string $resource = UserResource::class;

    // Define un método protegido llamado getHeaderActions que devuelve un arreglo de acciones de encabezado
    protected function getHeaderActions(): array
    {
        // Devuelve una acción de creación encapsulada en un arreglo
        return [
            Actions\CreateAction::make(),
        ];
    }
}
