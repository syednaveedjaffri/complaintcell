<?php

namespace App\Filament\Widgets;

use auth;
use App\Models\User;
use App\Models\Query;
use App\Models\Campus;
use App\Models\Department;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 3;

    public static function canView(): bool
    {
        return auth()->user()->hasRole(['super-admin','admin']);
    }

    protected function getCards(): array
    {

        return [
            Card::make('Total Queries', Query::count()),

        Card::make('Total Users', User::count()),
        // Card::make('Total Departments', Department::count()),
        // Card::make('Campus', Campus::count()),


        ];
    }


}
