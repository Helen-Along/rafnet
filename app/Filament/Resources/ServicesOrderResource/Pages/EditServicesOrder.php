<?php

namespace App\Filament\Resources\ServicesOrderResource\Pages;

use App\Filament\Resources\ServicesOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicesOrder extends EditRecord
{
    protected static string $resource = ServicesOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
