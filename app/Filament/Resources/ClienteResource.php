<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Filament\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;

class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([


            Section::make('Rate limiting')
            ->description('Prevent abuse by limiting the number of requests per period')
            ->columns(3)
            ->schema([
                TextInput::make('id')
            ->name('Identificacion')
            ->integer()
            ->required(),

            TextInput::make('Nombre')
            ->maxLength(255)
            ->required(),

            TextInput::make('Apellido')
            ->maxLength(255)
            ->required(),

            TextInput::make('Direccion')
            ->required(),

            TextInput::make('Telefono')
            ->tel()
            ->required(),

            TextInput::make('redes_sociales'),

            TextInput::make('correo_electronico')
                ->email(),

            ]),
            
            Section::make('Rate limiting')
            ->description('Prevent abuse by limiting the number of requests per period')
            ->schema([
                TextInput::make('nombre_trabajo')->name('Nombre del trabajo'),
                TextInput::make('direccion_trabajo')->name('Direccion del lugar de trabajo'),
                TextInput::make('foto'),
    
                
            ])

           

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                ->searchable(),
                TextColumn::make('nombre_trabajo')
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
