<?php

namespace App\Filament\Resources\ComplaincategorytypeResource\Pages;

use App\Filament\Resources\ComplaincategorytypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComplaincategorytype extends EditRecord
{
    protected static string $resource = ComplaincategorytypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
