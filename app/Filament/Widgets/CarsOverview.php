<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CarsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Carros cadastrados', Car::query()->count()),
        ];
    }
}
