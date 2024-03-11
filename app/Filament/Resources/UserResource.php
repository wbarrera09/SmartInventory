<?php

namespace App\Filament\Resources;

use App\Filament\Exports\UsersExporter;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Models\Export;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions\Exports\Enums\ExportFormat;




class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')
                ->label('Nombre')
                ->required(),

                TextInput::make('email')
                ->label('Correo')
                ->email()
                ->required(),

                TextInput::make('password')
                ->label('Contraseña')
                ->hiddenOn('edit')
                ->password()
                ->revealable()
                ->required(),
            
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
                
            ->columns([
                TextColumn::make('name')
                ->label('Nombre')
                ->searchable()
                ->sortable(),

                TextColumn::make('email')
                ->label('Correo electrónico')
                ->searchable()
                ->sortable(),
                TextColumn::make('created_at')
                ->label('Fecha Creación')
                ->searchable()
                ->sortable()
                


                //Los campos mencionados anteriormente funcionan desde la tabla Users y mostrarlos
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    ExportBulkAction::make()
                    ->exporter(UsersExporter::class)
                    ->formats([
                        ExportFormat::Xlsx,
                        ExportFormat::Csv,
                        
                    ])

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
