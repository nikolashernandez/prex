<?php

namespace App\Filament\Resources\IntereResource\Pages;

use App\Filament\Resources\IntereResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntere extends EditRecord
{
    protected static string $resource = IntereResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
