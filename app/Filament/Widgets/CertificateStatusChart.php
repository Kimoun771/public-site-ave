<?php

namespace App\Filament\Widgets;

use App\Models\Certificate;
use Filament\Widgets\BarChartWidget;
use Illuminate\Support\Carbon;

class CertificateStatusChart extends BarChartWidget
{
    public function getHeading(): string
    {
        return __('certificate_status_chart.title');
    }

    protected function getData(): array
    {
        $validCount = Certificate::where('is_suspended', false)
            ->where(function ($query) {
                $query->whereNull('expire_date')
                    ->orWhere('expire_date', '>', Carbon::now());
            })->count();

        $expiredCount = Certificate::where('is_suspended', false)
            ->whereDate('expire_date', '<', Carbon::now())
            ->count();

        $suspendedCount = Certificate::where('is_suspended', true)->count();

        return [
            'datasets' => [
                [
                    'label' => __('certificate_status_chart.label'),
                    'data' => [$validCount, $expiredCount, $suspendedCount],
                    'backgroundColor' => [
                        'rgba(34,197,94,0.7)',
                        'rgba(251,191,36,0.7)',
                        'rgba(239,68,68,0.7)',
                    ],
                ],
            ],
            'labels' => [
                __('certificate_status_chart.valid'),
                __('certificate_status_chart.expired'),
                __('certificate_status_chart.suspended'),
            ],
        ];
    }
}
