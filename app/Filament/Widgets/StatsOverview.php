<?php

namespace App\Filament\Widgets;

use App\Models\Collection;
use App\Models\Compilation;
use App\Models\Instrument;
use App\Models\Piece;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static bool $isLazy = false;
    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make(__('Instruments'), Instrument::query()->count()),
            Stat::make(__('Collections'), Collection::query()->count()),
            Stat::make(__('Pieces'), Piece::query()->count()),
            Stat::make(__('Compilations'), Compilation::query()->count()),
        ];
    }
}
