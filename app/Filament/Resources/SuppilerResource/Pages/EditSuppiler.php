<?php

namespace App\Filament\Resources\SuppilerResource\Pages;

use App\Filament\Resources\SuppilerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuppiler extends EditRecord
{
    protected static string $resource = SuppilerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
