<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use App\Models\FinancingProposalModel;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Propostas de financiamento', FinancingProposalModel::query()->count())
            ->description('3% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
            Stat::make('Carros cadastrados', Car::query()->count())
            ->description('3% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
