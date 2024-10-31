<?php

namespace App\Filament\Resources\ServicesOrderResource\Pages;

use App\Filament\Resources\ServicesOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServicesOrders extends ListRecords
{
    protected static string $resource = ServicesOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
