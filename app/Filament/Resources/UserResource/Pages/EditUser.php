<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource; // Importa la clase UserResource del namespace especificado
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Infolists\Components\Actions as ComponentsActions; // Importa la clase Actions del componente Infolist del framework Filament
use Filament\Resources\Pages\EditRecord; // Importa la clase EditRecord del framework Filament


// Define una clase llamada EditUser que extiende de EditRecord
class EditUser extends EditRecord

{    
    // Declara una propiedad estática llamada $resource y la inicializa con la clase UserResource
    protected static string $resource = UserResource::class;


    // Define un método protegido llamado getRedirectUrl que devuelve una cadena de caracteres
    protected function getRedirectUrl(): string
    {
        // Devuelve la URL de redirección a la página de índice de recursos de la clase UserResource
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


