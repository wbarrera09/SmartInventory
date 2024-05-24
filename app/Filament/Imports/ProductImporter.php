<?php

namespace App\Filament\Imports;

use App\Models\Product;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ProductImporter extends Importer
{
    protected static ?string $model = Product::class;

    public static function getColumns(): array
    {
        return [

            // Se definen las columnas a importar
            ImportColumn::make('description')
            ->label('Descripción')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
            ImportColumn::make('stock')
            ->requiredMapping()
            ->rules(['required', 'numeric', 'min:0']),
            ImportColumn::make('location')
            ->label('Ubicación')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
            ImportColumn::make('size')
            ->label('Tamaño'),
            ImportColumn::make('format')
            ->label('Formato'),
            ImportColumn::make('grade')
            ->label('Grado'),
            ImportColumn::make('input')
            ->label('Entrada'),
            ImportColumn::make('brand')
            ->label('Marca'),
            ImportColumn::make('model')
            ->label('Modelo'),
            ImportColumn::make('processor')
            ->label('Procesador'),
            ImportColumn::make('capacity')
            ->label('Capacidad'),
            ImportColumn::make('technology')
            ->label('Tecnología'),
            ImportColumn::make('status')
            ->label('Estado'),
            ImportColumn::make('port')
            ->label('Puerto'),
            ImportColumn::make('comments')
            ->label('Comentarios'),
            ImportColumn::make('categories_id')


        ];
    }

    public function resolveRecord(): ?Product
    {
        // return Product::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Product();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'La importación de productos se ha completado y ' . number_format($import->successful_rows) . ' ' . str('filas')->plural($import->successful_rows) . ' importadas.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('filas')->plural($failedRowsCount) . ' Error al importar.';
        }

        return $body;
    }
}
