<?php

namespace App\Filament\Resources\TurnosResource\Pages;

use App\Filament\Resources\TurnosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTurnos extends EditRecord
{
    protected static string $resource = TurnosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
