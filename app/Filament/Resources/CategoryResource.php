<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages; // Importa el namespace de las páginas relacionadas con la gestión de categorías
use App\Filament\Resources\CategoryResource\RelationManagers; // Importa el namespace de los administradores de relaciones relacionados con las categorías
use App\Models\Category; // Importa el modelo de categoría
use Filament\Forms; // Importa las clases de formulario de Filament
use Filament\Forms\Components\TextInput; // Importa el componente de entrada de texto para formularios de Filament
use Filament\Forms\Form; // Importa la clase Form de Filament para la construcción de formularios
use Filament\Resources\Resource; // Importa la clase Resource de Filament
use Filament\Tables; // Importa las clases de tabla de Filament
use Filament\Tables\Columns\TextColumn; // Importa la columna de texto para las tablas de Filament
use Filament\Tables\Table; // Importa la clase Table de Filament para la construcción de tablas
use Illuminate\Database\Eloquent\Builder; // Importa la clase Builder para consultas Eloquent
use Illuminate\Database\Eloquent\SoftDeletingScope; // Importa el alcance de eliminación suave de Eloquent
use App\Filament\Exports\CategoryExporter; // Importa el exportador de categorías personalizado
use App\Filament\Resources\CategoryResource\Widgets\CategoryWidget;
use Filament\Actions\Exports\Enums\ExportFormat; // Importa el formato de exportación de Filament
use Filament\Tables\Actions\ExportBulkAction; // Importa la acción de exportación masiva de Filament
use Illuminate\Database\Eloquent\Model;

class CategoryResource extends Resource
{
    // Establece el modelo de Eloquent asociado a esta clase de recurso
    protected static ?string $model = Category::class;

    // Establece el icono de navegación para este recurso
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   /* // Se utiliza para mandar a llamar en la busqueda general de todo el sistema
    protected static ?string $recordTitleAttribute = 'category_name';*/

    public static function getGloballySearchableAttributes(): array
    {
        return ['id','category_name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
{
    return [
        'id' => $record->id,
        'Categoria' => $record->category_name
    ];
}


    // Define la estructura del formulario para la creación y edición de registros
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('category_name')->required()->maxLength(150) // Define un campo de texto para la descripción de la categoría
            ]);
    }

    // Define la estructura de la tabla para la visualización de registros
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id') // Columna para mostrar la descripción de la categoría
                ->searchable() // Permite la búsqueda en esta columna
                ->sortable(), // Permite ordenar los resultados por esta columna
                TextColumn::make('category_name') // Columna para mostrar la descripción de la categoría
                    ->label('Categorias')
                    ->searchable() // Permite la búsqueda en esta columna
                    ->sortable(), // Permite ordenar los resultados por esta columna
                TextColumn::make('created_at') // Columna para mostrar la fecha de creación
                    ->dateTime() // Muestra la fecha y hora en formato datetime
                    ->sortable() // Permite ordenar los resultados por esta columna
                    ->toggleable(isToggledHiddenByDefault:true), // Permite alternar la visibilidad de esta columna
                TextColumn::make('updated_at') // Columna para mostrar la fecha de actualización
                    ->dateTime() // Muestra la fecha y hora en formato datetime
                    ->sortable() // Permite ordenar los resultados por esta columna
                    ->toggleable(isToggledHiddenByDefault:true), // Permite alternar la visibilidad de esta columna
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
                        ->exporter(CategoryExporter::class) // Utiliza el exportador personalizado de categorías
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

    
    // Se utiliza para mandar a llamar los widgets desde el archivo CategoryWidget.php
    public static function getWidgets(): array
    {
        return [
            CategoryWidget::class,
        ];
    }



    // Define las páginas asociadas a este recurso
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'), // Página de listado de categorías
            'create' => Pages\CreateCategory::route('/create'), // Página de creación de categorías
            'edit' => Pages\EditCategory::route('/{record}/edit'), // Página de edición de categorías
        ];
    }



}
