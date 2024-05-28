<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestamoResource\Pages;
use App\Filament\Resources\PrestamoResource\RelationManagers;
use App\Models\Prestamo;
use App\Models\Cliente;
use App\Models\FrecuenciaPago;
use App\Models\Intere;


use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;

class PrestamoResource extends Resource
{
    protected static ?string $model = Prestamo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            
                
                Section::make('Rate limiting')
                ->description('Prevent abuse by limiting the number of requests per period')
                ->columns(3)
                ->schema([
                    
                    DatePicker::make('fecha_prestamo')
                    ->name('Fecha del prestamo'),
    
                    TextInput::make('monto')
                    ->name('Monto'),
    
                    TextInput::make('resto')
                    ->name('Suma a Restar'),
                    
                ]),
    


                Section::make('Rate limiting')
                ->description('Prevent abuse by limiting the number of requests per period')
                ->schema([
                    Select::make('cliente_id')
                    ->label('Cliente')
                    ->options(Cliente::all()->pluck('nombre', 'id')),
    
                    Select::make('Recomienda')
                    ->label('Quien Recomienda')
                    ->options(Cliente::all()->pluck('nombre', 'id')),
        
                    
                ]),
    
                
                Section::make('Rate limiting')
                ->description('Prevent abuse by limiting the number of requests per period')
                ->schema([
                    Select::make('frecuencia_pago_id')
                    ->label('Frecuencia de pago')
                    ->options(FrecuenciaPago::all()->pluck('nombre', 'id')),
    
                    Select::make('intere_id')
                    ->label('Interes')
                    ->options(Intere::all()->pluck('porcetaje', 'id')),
    
                    Textarea::make('descripcion')
                    ->label('Descripcion'),
                ]),
    
               

               

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fecha_prestamo')->label('Fecha del prestamo'),
                TextColumn::make('cliente_id')->label('Cliente'),

                TextColumn::make('monto')->label('Monto prestado'),
                TextColumn::make('Recomienda')->label('Recomienda'),
                
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
            'index' => Pages\ListPrestamos::route('/'),
            'create' => Pages\CreatePrestamo::route('/create'),
            'edit' => Pages\EditPrestamo::route('/{record}/edit'),
        ];
    }
}
