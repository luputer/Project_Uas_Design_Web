<?php

namespace App\Filament\Resources\DapilResource\Pages;

use App\Filament\Resources\DapilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDapils extends ListRecords
{
    protected static string $resource = DapilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
