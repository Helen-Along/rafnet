<?php

namespace App\Filament\Resources\SuppilerResource\Pages;

use App\Filament\Resources\SuppilerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuppilers extends ListRecords
{
    protected static string $resource = SuppilerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
