<?php
namespace App\Filament\Widgets;

use App\Models\Company;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CompanyCount extends BaseWidget
{
    protected int|string|array $columnSpan = 1;

    protected function getCards(): array
    {
        return [
            Card::make(__('dashboard.total_companies'), Company::count())
                ->description(__('dashboard.registered_companies'))
                ->color('primary')
                ->icon('heroicon-o-building-office-2')
                ->url(route('filament.admin.resources.companies.index')),
        ];
    }
}
