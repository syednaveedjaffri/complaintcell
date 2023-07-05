<?php

namespace App\Filament\Resources\ComplaincategoryResource\Pages;

use App\Filament\Resources\ComplaincategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComplaincategory extends EditRecord
{
    protected static string $resource = ComplaincategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
