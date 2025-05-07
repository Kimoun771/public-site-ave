<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CompanyCount;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Widgets;
use App\Filament\Widgets\CertificateOverview;
use App\Filament\Widgets\CertificateStatusChart;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            Widgets\Grid::make(2)
            ->schema([
                CertificateOverview::class,
                CertificateStatusChart::class,
                CompanyCount::class,
            ]),
        ];
    }
}
