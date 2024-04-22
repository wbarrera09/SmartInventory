<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Exports\UsersExporter;
use App\Filament\Resources\UserResource; // Importa la clase UserResource del namespace especificado
use App\Filament\Resources\UserResource\Widgets\UserWidget;
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Actions\ExportAction;
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
            Actions\CreateAction::make()
            ->label('Crear Usuario')
            ->label('Crear Producto')
            ->icon('heroicon-o-user'),
            ExportAction::make()
            ->exporter(UsersExporter::class)
            ->label('Exportar CSV')
            ->icon('heroicon-o-document-arrow-down')
            ->color('success')
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserWidget::class,

        ];
    }
}
