<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource; // Importa la clase ProductResource del namespace especificado
use App\Filament\Resources\ProductResource\Widgets\ProductChart;
use App\Filament\Resources\ProductResource\Widgets\ProductLineChart;
use App\Filament\Resources\ProductResource\Widgets\ProductPieChart;
use App\Filament\Resources\ProductResource\Widgets\ProductWidget;
use Filament\Actions; // Importa la clase Actions del framework Filament
use Filament\Resources\Pages\ListRecords; // Importa la clase ListRecords del framework Filament

// Define una clase llamada ListProducts que extiende de ListRecords
class ListProducts extends ListRecords
{
    // Declara una propiedad estática llamada $resource y la inicializa con la clase ProductResource
    protected static string $resource = ProductResource::class;

    // Define un método protegido llamado getHeaderActions que devuelve un arreglo de acciones de encabezado
    protected function getHeaderActions(): array
    {
        // Devuelve una acción de creación encapsulada en un arreglo
        return [
            Actions\CreateAction::make()
            ->label('Crear Producto')
        ];
    }

    


    protected function getHeaderWidgets(): array
    {
        return [
            ProductWidget::class,
          //  ProductChart::class,
          //  ProductPieChart::class,
          //  ProductLineChart::class
            

        ];
    }


}
