<?php

namespace App\Filament\Resources\FrecuenciaPagoResource\Pages;

use App\Filament\Resources\FrecuenciaPagoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFrecuenciaPagos extends ListRecords
{
    protected static string $resource = FrecuenciaPagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
