<?php

namespace App\Filament\Exports;

use App\Models\Product; // Importa el modelo de producto
use Filament\Actions\Exports\ExportColumn; // Importa la columna de exportación de Filament
use Filament\Actions\Exports\Exporter; // Importa la clase Exporter de Filament para la exportación de datos
use Filament\Actions\Exports\Models\Export; // Importa la acción de exportación de modelos de Filament



class ProductExporter extends Exporter


{
    // Establece el modelo de Eloquent asociado a este exportador
    protected static ?string $model = Product::class;

    // Define las columnas que se exportarán
    public static function getColumns(): array
    {
        return [


            ExportColumn::make('id', 'id'),
            ExportColumn::make('categories.category_name', 'categories.category_name'),
            ExportColumn::make('description', 'description'),
            ExportColumn::make('stock', 'stock'),
            ExportColumn::make('location', 'location'),
            ExportColumn::make('size', 'size'),
            ExportColumn::make('format', 'format'),
            ExportColumn::make('grade', 'grade'),
            ExportColumn::make('input', 'input'),
            ExportColumn::make('brand', 'brand'),
            ExportColumn::make('model', 'model'),
            ExportColumn::make('processor', 'processor'),
            ExportColumn::make('capacity', 'capacity'),
            ExportColumn::make('technology', 'technology'),
            ExportColumn::make('status', 'status'),
            ExportColumn::make('port', 'port'),
            ExportColumn::make('comments', 'comments'),
            ExportColumn::make('categories_id', 'categories_id'),
            ExportColumn::make('created_at', 'created_at'),
            ExportColumn::make('updated_at', 'updated_at')

        ];
    }

   

    // Define el cuerpo de la notificación una vez que se ha completado la exportación
    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your product export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
