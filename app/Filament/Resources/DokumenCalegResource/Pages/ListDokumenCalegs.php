<?php

namespace App\Filament\Resources\DokumenCalegResource\Pages;

use App\Filament\Resources\DokumenCalegResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokumenCalegs extends ListRecords
{
    protected static string $resource = DokumenCalegResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
