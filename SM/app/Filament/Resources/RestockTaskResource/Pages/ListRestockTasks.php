<?php

namespace App\Filament\Resources\RestockTaskResource\Pages;

use App\Filament\Resources\RestockTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestockTasks extends ListRecords
{
    protected static string $resource = RestockTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
