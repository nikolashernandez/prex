<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FrecuenciaPagoResource\Pages;
use App\Filament\Resources\FrecuenciaPagoResource\RelationManagers;
use App\Models\FrecuenciaPago;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class FrecuenciaPagoResource extends Resource
{
    protected static ?string $model = FrecuenciaPago::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                ->name('Nombre de forma de pago')
                ->integer()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('nombre')->label('Frecuencia de pago')
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
            'index' => Pages\ListFrecuenciaPagos::route('/'),
            'create' => Pages\CreateFrecuenciaPago::route('/create'),
            'edit' => Pages\EditFrecuenciaPago::route('/{record}/edit'),
        ];
    }
}
