<?php

namespace App\Filament\Resources;

use App\Filament\Exports\UsersExporter; // Importa el exportador de usuarios personalizado
use App\Filament\Resources\UserResource\Pages; // Importa el namespace de las páginas relacionadas con la gestión de usuarios
use App\Filament\Resources\UserResource\RelationManagers; // Importa el namespace de los administradores de relaciones relacionados con los usuarios
use App\Models\User; // Importa el modelo de usuario
use Filament\Actions\ExportAction; // Importa la acción de exportación de Filament
use Filament\Actions\Exports\Models\Export; // Importa la acción de exportación de modelos de Filament
use Filament\Forms; // Importa las clases de formulario de Filament
use Filament\Forms\Components\TextInput; // Importa el componente de entrada de texto para formularios de Filament
use Filament\Forms\Form; // Importa la clase Form de Filament para la construcción de formularios
use Filament\Forms\FormsComponent; // Importa la clase FormsComponent de Filament
use Filament\Resources\Resource; // Importa la clase Resource de Filament
use Filament\Tables; // Importa las clases de tabla de Filament
use Filament\Tables\Actions\ExportBulkAction; // Importa la acción de exportación masiva de Filament
use Filament\Tables\Columns\TextColumn; // Importa la columna de texto para las tablas de Filament
use Filament\Tables\Table; // Importa la clase Table de Filament para la construcción de tablas
use Illuminate\Database\Eloquent\Builder; // Importa la clase Builder para consultas Eloquent
use Illuminate\Database\Eloquent\SoftDeletingScope; // Importa el alcance de eliminación suave de Eloquent
use Filament\Actions\Exports\Enums\ExportFormat; // Importa el formato de exportación de Filament
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    // Establece el modelo de Eloquent asociado a esta clase de recurso
    protected static ?string $model = User::class;

    // Establece el icono de navegación para este recurso
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getGloballySearchableAttributes(): array
    {
        return ['id','name','email'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'id' => $record->id,
            'name' => $record->name,
            'email' => $record->email
        ];
    }




    // Define la estructura del formulario para la creación y edición de registros
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name') // Campo de entrada de texto para el nombre del usuario
                    ->label('Nombre') // Etiqueta del campo
                    ->required(), // Campo requerido

                TextInput::make('email') // Campo de entrada de texto para el correo electrónico del usuario
                    ->label('Correo') // Etiqueta del campo
                    ->email() // Validación del formato de correo electrónico
                    ->required(), // Campo requerido

                TextInput::make('password') // Campo de entrada de texto para la contraseña del usuario
                    ->label('Contraseña') // Etiqueta del campo
                    ->hiddenOn('edit') // Oculta este campo en la edición de registros existentes
                    ->password() // Campo de contraseña
                    ->revealable() // Permite revelar la contraseña
                    ->required(), // Campo requerido
            ]);
    }

    // Define la estructura de la tabla para la visualización de registros
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id') // Columna para mostrar el nombre del usuario
                ->searchable() // Permite la búsqueda en esta columna
                ->sortable(), // Permite ordenar los resultados por esta columna

                TextColumn::make('name') // Columna para mostrar el nombre del usuario
                    ->label('Nombre') // Etiqueta de la columna
                    ->searchable() // Permite la búsqueda en esta columna
                    ->sortable(), // Permite ordenar los resultados por esta columna

                TextColumn::make('email') // Columna para mostrar el correo electrónico del usuario
                    ->label('Correo electrónico') // Etiqueta de la columna
                    ->searchable() // Permite la búsqueda en esta columna
                    ->sortable(), // Permite ordenar los resultados por esta columna

                TextColumn::make('created_at') // Columna para mostrar la fecha de creación del usuario
                    ->label('Fecha Creación') // Etiqueta de la columna
                    ->searchable() // Permite la búsqueda en esta columna
                    ->sortable(), // Permite ordenar los resultados por esta columna
            ])
            ->filters([
                // No se han definido filtros para esta tabla
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Acción para ver detalles de un registro
                Tables\Actions\EditAction::make(), // Acción para editar un registro
                Tables\Actions\DeleteAction::make(), // Acción para eliminar un registro
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Acción de eliminación masiva de registros
                    ExportBulkAction::make() // Acción de exportación masiva de registros
                        ->exporter(UsersExporter::class) // Utiliza el exportador personalizado de usuarios
                        ->formats([
                            ExportFormat::Xlsx, // Formato de exportación XLSX
                            ExportFormat::Csv, // Formato de exportación CSV
                        ])
                ]),
            ]);
    }

    // Define las relaciones de este recurso
    public static function getRelations(): array
    {
        return [
            // No se han definido relaciones para este recurso
        ];
    }

    // Define las páginas asociadas a este recurso
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'), // Página de listado de usuarios
            'create' => Pages\CreateUser::route('/create'), // Página de creación de usuarios
            'edit' => Pages\EditUser::route('/{record}/edit'), // Página de edición de usuarios
        ];
    }
}
