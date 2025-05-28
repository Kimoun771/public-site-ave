<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ServiceSetting extends Settings
{
   public array $services = [];
   public array $hero;

    public static function group(): string
    {
        return 'service';
    }
    public function getFormattedSettings(): array
    {
        return [
            'services' => array_map(function ($service) {
                return [
                    'title' => $service['name'][app()->getLocale()] ?? '',
                    'desc' => $service['description'][app()->getLocale()] ?? '',
                    'imageUrl' => $service['image'] ?? null,
                ];
            }, $this->services),
            'hero' => [
                'title' => $this->hero['title'][app()->getLocale()] ?? '',
                'desc' => $this->hero['description'][app()->getLocale()] ?? '',
                'src' => $this->hero['image'] ?? null,
            ],
        ];
    }
}


