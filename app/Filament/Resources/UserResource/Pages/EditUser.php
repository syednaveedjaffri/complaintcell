<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Page;
use Filament\Pages\Actions;

use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\Rules\Password;
use Filament\Resources\Pages\CreateRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),

        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Registered User is Updated';
    }
}
