<?php

namespace App\Filament\Resources\ComplaincategorytypeResource\Pages;

use App\Filament\Resources\ComplaincategorytypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComplaincategorytype extends CreateRecord
{
    protected static string $resource = ComplaincategorytypeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Category Type is Saved';
    }
}
