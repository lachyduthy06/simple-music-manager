<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LatestAdditionsTable;
use App\Filament\Widgets\StatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    public function getTitle(): string|Htmlable
    {
        return __('Dashboard');
    }


    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            LatestAdditionsTable::class,
        ];
    }
}
