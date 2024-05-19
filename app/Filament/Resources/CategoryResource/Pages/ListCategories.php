<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Exports\CategoryExporter;
use App\Filament\Imports\CategoryImporter;
use App\Filament\Resources\CategoryResource; // Importa la clase CategoryResource del namespace especificado
use App\Filament\Resources\CategoryResource\Widgets\CategoryWidget;
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords; // Importa la clase ListRecords del framework Filament
use Illuminate\Contracts\View\View;
use App\Models\User;

// Define una clase llamada ListCategories que extiende de ListRecords
class ListCategories extends ListRecords
{
    // Declara una propiedad estática llamada $resource y la inicializa con la clase CategoryResource
    protected static string $resource = CategoryResource::class;


    // Define un método protegido llamado getHeaderActions que devuelve un arreglo de acciones de encabezado
    protected function getHeaderActions(): array
    {
        // Devuelve una acción de creación encapsulada en un arreglo
        return [
            Actions\CreateAction::make()
                ->label('Crear Categoria')
                ->icon('heroicon-o-briefcase'),
            ExportAction::make()
                ->exporter(CategoryExporter::class)
                ->label('Exportar')
                ->color('success')
                ->icon('heroicon-o-document-arrow-down')
                ->visible(function() {
                    /** @var User */
                    $user = auth()->user();
                    return $user->hasAnyRole(['SuperAdmin','Admin']);

                }),
            ImportAction::make()
                ->importer(CategoryImporter::class)
                ->label('Importar')
                ->color('slate')
                ->icon('heroicon-o-document-arrow-up')
                ->visible(function() {
                    /** @var User */
                    $user = auth()->user();
                    return $user->hasAnyRole(['SuperAdmin']);

                })

        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CategoryWidget::class,

        ];
    }
}
