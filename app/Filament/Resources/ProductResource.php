<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages; // Importa el namespace de las páginas relacionadas con la gestión de productos
use App\Filament\Resources\ProductResource\RelationManagers; // Importa el namespace de los administradores de relaciones relacionados con los productos
use App\Models\Product; // Importa el modelo de producto
use Filament\Forms; // Importa las clases de formulario de Filament
use Filament\Forms\Form; // Importa la clase Form de Filament para la construcción de formularios
use Filament\Resources\Resource; // Importa la clase Resource de Filament
use Filament\Tables; // Importa las clases de tabla de Filament
use Filament\Tables\Table; // Importa la clase Table de Filament para la construcción de tablas
use Illuminate\Database\Eloquent\Builder; // Importa la clase Builder para consultas Eloquent
use Illuminate\Database\Eloquent\SoftDeletingScope; // Importa el alcance de eliminación suave de Eloquent
use App\Filament\Exports\ProductExporter; // Importa el exportador de productos personalizado
use App\Models\Category;
use DeepCopy\Filter\Filter as FilterFilter;
use Filament\Actions\Exports\Enums\ExportFormat; // Importa el formato de exportación de Filament
use Filament\Tables\Actions\ExportBulkAction; // Importa la acción de exportación masiva de Filament
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
// use Filament\Tables\Enums\FiltersLayout;
// se utiliza para poder colocar los filtros encima de la tabla, actualmente en exploracion


class ProductResource extends Resource
{
    // Establece el modelo de Eloquent asociado a esta clase de recurso
    protected static ?string $model = Product::class;

    // Establece el icono de navegación para este recurso
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Define la estructura del formulario para la creación y edición de registros
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('categories_id') // Campo de selección para el ID de categorías
                    ->relationship('categories', 'description') // Establece la relación con la descripción de las categorías
                    ->required() // Campo requerido
                    ->searchable() // Permite la búsqueda en este campo
                    ->preload() // Precarga los datos relacionados
                    ->label('Categorias'), // Etiqueta del campo
                Forms\Components\TextInput::make('description') // Campo de entrada de texto para la descripción del producto
                    ->required() // Campo requerido
                    ->maxLength(255) // Longitud máxima del campo
                    ->label('Descripcion'), // Etiqueta del campo
                Forms\Components\TextInput::make('price') // Campo de entrada de texto para el precio del producto
                    ->required() // Campo requerido
                    ->numeric() // Se espera un valor numérico
                    ->prefix('$') // Prefijo del valor
                    ->label('Precio'), // Etiqueta del campo
                Forms\Components\TextInput::make('stock') // Campo de entrada de texto para el stock del producto
                    ->required() // Campo requerido
                    ->numeric() // Se espera un valor numérico
            ]);
    }

    // Define la estructura de la tabla para la visualización de registros
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description') // Columna para mostrar la descripción del producto
                    ->searchable() // Permite la búsqueda en esta columna
                    ->label('Descripcion'), // Etiqueta de la columna
                Tables\Columns\TextColumn::make('price') // Columna para mostrar el precio del producto
                    ->money() // Muestra el valor como un monto monetario
                    ->sortable() // Permite ordenar los resultados por esta columna
                    ->label('Precio'), // Etiqueta de la columna

                Tables\Columns\TextColumn::make('stock') // Columna para mostrar el stock del producto
                    ->numeric() // Muestra el valor como numérico
                    ->sortable(), // Permite ordenar los resultados por esta columna
                    
                Tables\Columns\TextColumn::make('categories.description') // Columna para mostrar la descripción de la categoría del producto
                    ->numeric() // Muestra el valor como numérico
                    ->sortable() // Permite ordenar los resultados por esta columna
                    ->label('Categorias'), // Etiqueta de la columna
                Tables\Columns\TextColumn::make('created_at') // Columna para mostrar la fecha de creación
                    ->dateTime() // Muestra la fecha y hora en formato datetime
                    ->sortable() // Permite ordenar los resultados por esta columna
                    ->toggleable(isToggledHiddenByDefault: true), // Permite alternar la visibilidad de esta columna
                Tables\Columns\TextColumn::make('updated_at') // Columna para mostrar la fecha de actualización
                    ->dateTime() // Muestra la fecha y hora en formato datetime
                    ->sortable() // Permite ordenar los resultados por esta columna
                    ->toggleable(isToggledHiddenByDefault: true), // Permite alternar la visibilidad de esta columna
            ])
            ->filters([
                SelectFilter::make('categories')
                    ->relationship('categories', 'description')
                    ->label('Categorias')
                    ->searchable()
                    ->preload()
                    ->multiple(),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                        ->label('Creado desde:'),                        
                        DatePicker::make('created_until')
                        ->label('Creado hasta:'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                            

            ], ) //layout: FiltersLayout::AboveContent)
                


            
            ->actions([
                Tables\Actions\ViewAction::make(), // Acción para ver detalles de un registro
                Tables\Actions\EditAction::make(), // Acción para editar un registro
                Tables\Actions\DeleteAction::make(), // Acción para eliminar un registro
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Acción de eliminación masiva de registros
                    ExportBulkAction::make() // Acción de exportación masiva de registros
                        ->exporter(ProductExporter::class) // Utiliza el exportador personalizado de productos
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
            'index' => Pages\ListProducts::route('/'), // Página de listado de productos
            'create' => Pages\CreateProduct::route('/create'), // Página de creación de productos
            'edit' => Pages\EditProduct::route('/{record}/edit'), // Página de edición de productos
        ];
    }
}
