<?php

namespace App\Filament\Resources\ComplaincategoryResource\Pages;

use App\Filament\Resources\ComplaincategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComplaincategory extends CreateRecord
{
    protected static string $resource = ComplaincategoryResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Category is Saved';
    }
}
