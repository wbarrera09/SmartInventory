<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [

            ImportColumn::make('name')
            ->label('Nombre')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
            ImportColumn::make('email')
            ->label('Correo Electrónico')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
            ImportColumn::make('password')
            ->label('Contraseña')
            ->requiredMapping()
            ->rules(['required', 'max:255']),




            
        ];
    }

    public function resolveRecord(): ?User
    {
        // return User::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new User();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'La importación de usuarios se ha completado y ' . number_format($import->successful_rows) . ' ' . str('filas')->plural($import->successful_rows) . ' importadas.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('filas')->plural($failedRowsCount) . ' Error al importar.';
        }

        return $body;
    }
}
