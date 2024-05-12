<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    // Establece el icono de navegación para este recurso
    protected static ?string $navigationIcon = 'heroicon-m-finger-print';

    // Se define el nombre de la pagina en el panel administrativo
    protected static ?string $navigationLabel = 'Roles';

    protected static ?int $navigationSort = 7; // Define el orden en el panel de navegación


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Rol')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('guard_name')
                    ->label('Tipo')
                    ->options([
                        'web' => 'Web',
                        'api' => 'API',
                    ])
                    ->required(),
                    Select::make('permissions')
                    ->relationship('permissions', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Roles')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guard_name')
                    ->label('Tipo')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('permissions.name')
                    ->sortable()
                    ->searchable()
                    ->label('Permisos'),


                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),


        
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
