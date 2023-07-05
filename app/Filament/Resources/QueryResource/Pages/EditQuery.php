<?php

namespace App\Filament\Resources\QueryResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\QueryResource;

class EditQuery extends EditRecord
{
    protected static string $resource = QueryResource::class;

    protected function getActions(): array
    {
        // if (auth()->user()){
        //     if (auth()->user()->hasRole(['admin']))
        return [
            Actions\DeleteAction::make(),
        ];

    }

    // public static function beforeFill()
    // {
    //     if($this->record->campus()->exists())
    //     {
    //         $this->redirect($this->getResource()::getUrl('index'));
    //     }
    // }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Query is Updated';
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

}
