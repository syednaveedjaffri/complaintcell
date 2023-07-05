<?php

namespace App\Filament\Resources\CampusResource\Pages;

use App\Filament\Resources\CampusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCampus extends CreateRecord
{
    protected static string $resource = CampusResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Campus is Saved';
    }
}
