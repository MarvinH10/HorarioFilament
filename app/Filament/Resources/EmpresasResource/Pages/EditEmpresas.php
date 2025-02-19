<?php

namespace App\Filament\Resources\EmpresasResource\Pages;

use App\Filament\Resources\EmpresasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmpresas extends EditRecord
{
    protected static string $resource = EmpresasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
