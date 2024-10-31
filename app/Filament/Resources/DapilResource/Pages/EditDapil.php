<?php

namespace App\Filament\Resources\DapilResource\Pages;

use App\Filament\Resources\DapilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDapil extends EditRecord
{
    protected static string $resource = DapilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
