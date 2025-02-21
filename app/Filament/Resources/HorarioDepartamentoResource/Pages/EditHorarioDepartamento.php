<?php

namespace App\Filament\Resources\HorarioDepartamentoResource\Pages;

use App\Filament\Resources\HorarioDepartamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHorarioDepartamento extends EditRecord
{
    protected static string $resource = HorarioDepartamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
