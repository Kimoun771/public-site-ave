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
        $now = Carbon::now();
        $validCount = Certificate::where(function ($query) use ($now) {
            $query->whereNull('expire_date')
                ->orWhere('expire_date', '>', $now);
        })->count();

        $suspendedCount = Certificate::whereNotNull('expire_date')
            ->where('expire_date', '<=', $now)
            ->count();
        return [
            Card::make(__('certificate_overview.total'), Certificate::count())
                ->url(route('filament.admin.resources.certificates.index'))
                ->color('gray'),

            Card::make(__('certificate_overview.valid'), $validCount)
                ->url(route('filament.admin.resources.certificates.index', ['status' => 'Valid']))
                ->color('success'),
            Card::make(__('certificate_overview.suspended'), $suspendedCount)
                ->url(route('filament.admin.resources.certificates.index', ['status' => 'Suspend']))
                ->color('danger'),
        ];

    }
}
