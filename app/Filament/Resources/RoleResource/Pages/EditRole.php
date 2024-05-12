<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

            // Define un método protegido llamado getRedirectUrl que devuelve una cadena de caracteres
            protected function getRedirectUrl(): string
            {
                // Devuelve la URL de redirección a la página de índice de recursos de la clase CategoryResource
                return $this->getResource()::getUrl('index');
            }
}
