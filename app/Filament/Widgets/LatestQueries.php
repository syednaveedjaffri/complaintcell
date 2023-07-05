<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\Query;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestQueries extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public static function canView(): bool
{
    return auth()->user()->hasRole(['super-admin','admin']);
}

    protected function getTableQuery(): Builder
    {
        return Query::query()->latest();
    }

    protected function getTableColumns():array
    {
        // if (auth()->user()){
        // if(fn () => auth()->user()->hasRole('admin'))
            return [
                // TextColumn::make('username')->label('Name')->toggleable(),
                TextColumn::make('faculty.faculty_name')->sortable()->searchable(),
                TextColumn::make('department.department_name')->sortable()->searchable(),
                TextColumn::make('complain.complain_type')->sortable()->searchable(),
                TextColumn::make('user.extension')->label('Extension')->sortable(),

                TextColumn::make('status')->disabled()->searchable(),
        ];
    }
    // }



    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
