<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;


    // Define un método protegido llamado getRedirectUrl que devuelve una cadena de caracteres
    protected function getRedirectUrl(): string
    {
        // Devuelve la URL de redirección a la página de índice de recursos de la clase CategoryResource
        return $this->getResource()::getUrl('index');
    }
}
