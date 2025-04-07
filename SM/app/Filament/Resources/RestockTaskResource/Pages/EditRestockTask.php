<?php

namespace App\Filament\Resources\RestockTaskResource\Pages;

use App\Filament\Resources\RestockTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestockTask extends EditRecord
{
    protected static string $resource = RestockTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
