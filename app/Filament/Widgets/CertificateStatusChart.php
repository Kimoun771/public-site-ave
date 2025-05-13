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
        $now = Carbon::now();
        $validCount = Certificate::where(function ($query) use ($now) {
            $query->whereNull('expire_date')
                ->orWhere('expire_date', '>', $now);
        })->count();

        $suspendedCount = Certificate::whereNotNull('expire_date')
            ->where('expire_date', '<=', $now)
            ->count();
        return [
            'labels' => [
                __('certificate_status_chart.label'),
            ],
            'datasets' => [
                [
                    'label' => __('certificate_status_chart.valid'),
                    'data' => [$validCount],
                    'backgroundColor' => '#16a34f',
                ],
                [
                    'label' => __('certificate_status_chart.suspended'),
                    'data' => [$suspendedCount],
                    'backgroundColor' => '#c41019',
                ],
            ],
        ];
    }
}
