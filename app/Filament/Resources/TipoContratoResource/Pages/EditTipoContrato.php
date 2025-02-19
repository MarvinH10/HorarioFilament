<?php

namespace App\Filament\Resources\TipoContratoResource\Pages;

use App\Filament\Resources\TipoContratoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoContrato extends EditRecord
{
    protected static string $resource = TipoContratoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
