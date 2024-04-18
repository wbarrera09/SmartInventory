<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource; // Importa la clase CategoryResource del namespace especificado
use App\Filament\Resources\CategoryResource\Widgets\CategoryWidget;
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Resources\Pages\ListRecords; // Importa la clase ListRecords del framework Filament

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
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CategoryWidget::class,

        ];
    }

}
