<?php

namespace App\Filament\Resources\FrecuenciaPagoResource\Pages;

use App\Filament\Resources\FrecuenciaPagoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFrecuenciaPago extends EditRecord
{
    protected static string $resource = FrecuenciaPagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
