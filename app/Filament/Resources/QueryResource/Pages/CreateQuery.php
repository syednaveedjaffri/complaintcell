<?php

namespace App\Filament\Resources\QueryResource\Pages;

use App\Models\User;
use Filament\Pages\Actions;
use App\Filament\Resources\QueryResource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateQuery extends CreateRecord
{
    protected static string $resource = QueryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Your Query is submitted successfully';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }


}
