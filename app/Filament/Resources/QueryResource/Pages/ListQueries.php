<?php

namespace App\Filament\Resources\QueryResource\Pages;

use App\Models\Query;
use Filament\Pages\Actions;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\QueryResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListQueries extends ListRecords
{
    protected static string $resource = QueryResource::class;

    protected function getTableQuery(): Builder
    {
        return Query::query()->latest();
        $role = Auth::user()->roles()->first();
        if($role->name === 'user' || $role->name === '')
        {
            return parent::getTableQuery()->where('user_id', auth()->user()->id);
        }

        else
        {
            return parent::getTableQuery();
        }

    }
     //OR
    //  public static function getEloquentQuery(): Builder
    //  {
    //     // return Query::query()->latest();
    //     return parent::getEloquentQuery()->withoutGlobalScopes([ActiveScope::class])->latest();
    //  }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }


}
