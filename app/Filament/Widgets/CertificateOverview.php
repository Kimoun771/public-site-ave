<?php

namespace App\Filament\Widgets;

use App\Models\Certificate;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Carbon;

class CertificateOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(__('certificate_overview.total'), Certificate::count())
                ->url(route('filament.admin.resources.certificates.index'))
                ->color('gray'),

            Card::make(__('certificate_overview.suspended'), Certificate::where('is_suspended', true)->count())
                ->url(route('filament.admin.resources.certificates.index', ['status' => 'Suspend']))
                ->color('danger'),

            Card::make(__('certificate_overview.valid'), Certificate::where('is_suspended', false)
                ->where(function ($query) {
                    $query->whereNull('expire_date')
                        ->orWhere('expire_date', '>', now());
                })
                ->count())
                ->url(route('filament.admin.resources.certificates.index', ['status' => 'Valid']))
                ->color('success'),
        ];

    }
}
