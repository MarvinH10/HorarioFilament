<?php

namespace App\Filament\Resources\HorarioEmpleadoResource\Pages;

use App\Filament\Resources\HorarioEmpleadoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHorarioEmpleados extends ListRecords
{
    protected static string $resource = HorarioEmpleadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
