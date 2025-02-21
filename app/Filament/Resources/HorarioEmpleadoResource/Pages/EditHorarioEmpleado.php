<?php

namespace App\Filament\Resources\HorarioEmpleadoResource\Pages;

use App\Filament\Resources\HorarioEmpleadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHorarioEmpleado extends EditRecord
{
    protected static string $resource = HorarioEmpleadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
