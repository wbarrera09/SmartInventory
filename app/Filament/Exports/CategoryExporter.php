<?php

namespace App\Filament\Exports;

use App\Models\Category; // Importa el modelo de categoría
use Filament\Actions\Exports\ExportColumn; // Importa la columna de exportación de Filament
use Filament\Actions\Exports\Exporter; // Importa la clase Exporter de Filament para la exportación de datos
use Filament\Actions\Exports\Models\Export; // Importa la acción de exportación de modelos de Filament

class CategoryExporter extends Exporter
{
    // Establece el modelo de Eloquent asociado a este exportador
    protected static ?string $model = Category::class;

    // Define las columnas que se exportarán
    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id', 'id'), // Columna de exportación para el ID de categoría
            ExportColumn::make('description', 'description'), // Columna de exportación para la descripción de categoría
            ExportColumn::make('created_at', 'created_at'), // Columna de exportación para la fecha de creación
            ExportColumn::make('updated_at', 'updated_at'), // Columna de exportación para la fecha de actualización
        ];
    }

    // Define el cuerpo de la notificación una vez que se ha completado la exportación
    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your category export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
