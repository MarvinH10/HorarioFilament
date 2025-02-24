<?php

namespace App\Filament\Resources\TurnosResource\Pages;

use App\Filament\Resources\TurnosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTurnos extends ListRecords
{
    protected static string $resource = TurnosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
