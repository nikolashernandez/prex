<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IntereResource\Pages;
use App\Filament\Resources\IntereResource\RelationManagers;
use App\Models\Intere;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class IntereResource extends Resource
{
    protected static ?string $model = Intere::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('porcetaje')
                ->name('porcetaje')
                ->integer()
                ->required(),

            ]);

            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('porcetaje')
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
            'index' => Pages\ListInteres::route('/'),
            'create' => Pages\CreateIntere::route('/create'),
            'edit' => Pages\EditIntere::route('/{record}/edit'),
        ];
    }
}
