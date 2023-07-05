<?php

namespace App\Filament\Resources\ComplaincategorytypeResource\Pages;

use App\Filament\Resources\ComplaincategorytypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComplaincategorytypes extends ListRecords
{
    protected static string $resource = ComplaincategorytypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
