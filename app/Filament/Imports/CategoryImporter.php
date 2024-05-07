<?php

namespace App\Filament\Imports;

use App\Models\Category;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CategoryImporter extends Importer
{
    protected static ?string $model = Category::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('category_name')
            ->label('Categoria')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?Category
    {
        // return Category::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        $existingCategory = Category::where('category_name', $this->data['category_name'])->first();

        if ($existingCategory) {
            // Si la categoría ya existe, lanza una excepción
            throw new \Exception('La categoría "' . $this->data['category_name'] . '" ya existe.');
        }
    
        // Si la categoría no existe, crea una nueva
        return new Category($this->data);

    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'La importación de categorias se ha completado y ' . number_format($import->successful_rows) . ' ' . str('filas')->plural($import->successful_rows) . ' importadas.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('filas')->plural($failedRowsCount) . ' Error al importar.';
        }

        return $body;
    }
}
