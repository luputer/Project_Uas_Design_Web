<?php

namespace App\Filament\Resources\PersonalBrandResource\Pages;

use App\Filament\Resources\PersonalBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonalBrand extends EditRecord
{
    protected static string $resource = PersonalBrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
