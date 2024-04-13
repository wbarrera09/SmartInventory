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
use Filament\Forms\FormsComponent;
use Filament\Forms\Get;
use Filament\Forms\Set;

use Filament\Tables\Enums\FiltersLayout;
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
                    ->relationship('categories', 'category_name') // Establece la relación con la descripción de las categorías
                    ->required() // Campo requerido
                    ->searchable() // Permite la búsqueda en este campo
                    ->preload() // Precarga los datos relacionados
                    ->label('Categoria') // Etiqueta del campo
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, Set $set) {  // Cambia los datos al momento de seleccionar una opcion

                        $incomeType = Category::find($state);

                        $set('category_type', @$incomeType->category_name);
                    })
                    ->afterStateHydrated(function ($state, Set $set) {

                        $incomeType = Category::find($state);

                        $set('category_type', @$incomeType->category_name);  // actualizar los campos luego de editar
                    }),


                // formulario para completar la información de los productos

                Forms\Components\TextInput::make('description')
                    ->required() // Campo requerido
                    ->maxLength(150)
                    ->label('Descripción'),
                Forms\Components\TextInput::make('stock')
                    ->required() // Campo requerido
                    ->numeric(), // Se espera un valor numérico
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(50)
                    ->label('Ubicación'),
                Forms\Components\TextInput::make('brand')
                    ->required() // Campo requerido
                    ->maxLength(80)
                    ->label('Marca'),

                Forms\Components\TextInput::make('model')
                    ->maxLength(80)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['Monitores', 'Almacenamiento', 'Teclados', 'RAM', 'Mouse']);
                    })
                    ->label('Modelo'),

                Forms\Components\TextInput::make('size')
                    ->maxLength(50)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['CPU', 'Almacenamiento', 'Teclados', 'RAM', 'Mouse']);
                    })
                    ->label('Tamaño'),

                Forms\Components\TextInput::make('format')
                    ->maxLength(50)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['Teclados', 'Mouse']);
                    })
                    ->label('Formato'),

                Forms\Components\TextInput::make('grade')
                    ->maxLength(50)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['CPU', 'Almacenamiento', 'Teclados', 'RAM', 'Mouse']);
                    })
                    ->label('Grado'),

                Forms\Components\TextInput::make('input')
                    ->maxLength(50)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['CPU', 'Almacenamiento', 'Teclados', 'RAM', 'Mouse']);
                    })
                    ->label('Entrada'),

                Forms\Components\TextInput::make('processor')
                    ->maxLength(100)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['Monitores', 'Almacenamiento', 'Teclados', 'RAM', 'Mouse']);
                    })
                    ->label('Procesador'),

                Forms\Components\TextInput::make('capacity')
                    ->maxLength(100)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['Monitores', 'CPU', 'Teclados', 'Mouse']);
                    })
                    ->label('Capacidad'),

                Forms\Components\TextInput::make('technology')
                    ->maxLength(100)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['Monitores', 'CPU', 'Teclados', 'Mouse']);
                    })
                    ->label('Tecnología'),

                Forms\Components\TextInput::make('port')
                    ->maxLength(25)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['Monitores', 'CPU', 'Almacenamiento', 'RAM']);
                    })
                    ->label('Puerto'),

                Forms\Components\TextInput::make('status')
                    ->maxLength(50)
                    ->hidden(function (Get $get) {
                        $categoryType = $get('category_type');
                        return in_array($categoryType, ['Monitores', 'CPU']);
                    })
                    ->label('Estado'),

                Forms\Components\TextInput::make('comments')
                    ->maxLength(100)
                    ->label('Comentarios'),


                Forms\Components\Hidden::make('category_type')


            ]);
    }

    // Define la estructura de la tabla para la visualización de registros
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categories.category_name')
                    ->sortable()
                    ->label('Categoria'),
                Tables\Columns\TextColumn::make('description')
                    ->sortable()
                    ->label('Descripción')
                    ->toggleable(isToggledHiddenByDefault: true), // Permite alternar la visibilidad de esta columna
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->sortable()
                    ->label('Ubicación'),
                Tables\Columns\TextColumn::make('brand')
                    ->sortable()
                    ->label('Marca')
                    ->visibleFrom('md'),
                Tables\Columns\TextColumn::make('model')
                    ->sortable()
                    ->label('Modelo'),
                Tables\Columns\TextColumn::make('size')
                    ->sortable()
                    ->label('Tamaño'),
                Tables\Columns\TextColumn::make('format')
                    ->sortable()
                    ->label('Formato'),
                Tables\Columns\TextColumn::make('grade')
                    ->sortable()
                    ->label('Grado'),
                Tables\Columns\TextColumn::make('input')
                    ->sortable()
                    ->label('Entrada'),
                Tables\Columns\TextColumn::make('processor')
                    ->sortable()
                    ->label('Procesador'),
                Tables\Columns\TextColumn::make('capacity')
                    ->sortable()
                    ->label('Capacidad'),
                Tables\Columns\TextColumn::make('technology')
                    ->sortable()
                    ->label('Tecnología'),
                Tables\Columns\TextColumn::make('port')
                    ->sortable()
                    ->label('Puerto'),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->label('Estado'),
                Tables\Columns\TextColumn::make('comments')
                    ->sortable()
                    ->label('Comentarios')
                    ->toggleable(isToggledHiddenByDefault: true), // Permite alternar la visibilidad de esta columna



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
                    ->relationship('categories', 'category_name')
                    ->label('Categorias')
                    ->searchable()
                    ->preload()
                    ->multiple(),

                SelectFilter::make('brand')
                    ->options(function () {
                        // Consulta la base de datos para obtener las marcas disponibles
                        return Product::distinct('brand')->pluck('brand', 'brand')->toArray();
                    })
                    ->label('Marcas')
                    ->multiple()
                    ->searchable()
                    ->preload(),

                SelectFilter::make('format')
                    ->options(function () {
                        // Consulta la base de datos para obtener los formatos disponibles excluyendo null
                        return Product::whereNotNull('format')->distinct('format')->pluck('format', 'format')->toArray();
                    })
                    ->label('Formato')
                    ->multiple()
                    ->searchable()
                    ->preload(),

                    SelectFilter::make('grade')
                    ->options(function () {
                        // Consulta la base de datos para obtener los formatos disponibles excluyendo null
                        return Product::whereNotNull('grade')->distinct('grade')->pluck('grade', 'grade')->toArray();
                    })
                    ->label('Grado')
                    ->multiple()
                    ->searchable()
                    ->preload(),

                    SelectFilter::make('input')
                    ->options(function () {
                        // Consulta la base de datos para obtener los formatos disponibles excluyendo null
                        return Product::whereNotNull('input')->distinct('input')->pluck('input', 'input')->toArray();
                    })
                    ->label('Entrada')
                    ->multiple()
                    ->searchable()
                    ->preload(),

                    SelectFilter::make('processor')
                    ->options(function () {
                        // Consulta la base de datos para obtener los formatos disponibles excluyendo null
                        return Product::whereNotNull('processor')->distinct('processor')->pluck('processor', 'processor')->toArray();
                    })
                    ->label('Procesador')
                    ->multiple()
                    ->searchable()
                    ->preload(),

                    Filter::make('created_from')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Creado desde:')
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date)
                        );
                    }),
                
                Filter::make('created_until')
                    ->form([
                        DatePicker::make('created_until')
                            ->label('Creado hasta:')
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date)
                        );
                    })
                
 
                
                    

/*
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
*/

            ], layout: FiltersLayout::AboveContentCollapsible)






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
