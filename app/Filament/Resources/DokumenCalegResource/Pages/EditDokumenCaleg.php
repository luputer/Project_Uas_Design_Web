<?php

namespace App\Filament\Resources\DokumenCalegResource\Pages;

use App\Filament\Resources\DokumenCalegResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDokumenCaleg extends EditRecord
{
    protected static string $resource = DokumenCalegResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
