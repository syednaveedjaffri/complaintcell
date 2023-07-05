<?php

namespace App\Filament\Resources\ComplaincategoryResource\Pages;

use App\Filament\Resources\ComplaincategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComplaincategories extends ListRecords
{
    protected static string $resource = ComplaincategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
