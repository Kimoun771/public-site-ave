<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ServiceSetting extends Settings
{
public array $services;

    public static function group(): string
    {
        return 'service';
    }
    public function getFormattedSettings(): array
    {
        return array_map(function ($service) {
            return [
                'title' => $service['name'][app()->getLocale()] ?? '',
                'description' => $service['description'][app()->getLocale()] ?? '',
                'imageUrl' => $service['image'] ?? null,
            ];
        }, $this->services);
    }
}


