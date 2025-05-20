<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;
use Spatie\Translatable\HasTranslations;

class InspectionSettings extends Settings
{
    use HasTranslations;
    public string $hero_image = '';
    public array $title = [];
    public array $description = [];
    public array $assurance_and_compliance_title = [];
    public array $assurance_and_compliance_description = [];
    public array $assurance_and_compliance_image_des = [];

    /**
     * Fields that are translatable.
     *
     * @var array<int, string>
     */
    protected array $translatable = [
        'title',
        'description',
        'assurance_and_compliance_title',
        'assurance_and_compliance_description',
        'assurance_and_compliance_image_des',
    ];

    /**
     * Group name used to identify this setting in the database.
     */
    public static function group(): string
    {
        return 'inspection';
    }

    /**
     * Return formatted settings based on the current locale.
     *
     * @return array<string, string>
     */
    public function getFormattedSettings(): array
    {
        $locale = app()->getLocale();

        return [
            'title' => $this->getTranslation('title', $locale),
            'description' => $this->getTranslation('description', $locale),
            'hero_image' => $this->hero_image,
            'assurance_and_compliance_title' => $this->getTranslation(
                'assurance_and_compliance_title',
                $locale
            ),
            'assurance_and_compliance_description' => $this->getTranslation(
                'assurance_and_compliance_description',
                $locale
            ),
            'assurance_and_compliance_image_des' => array_map(function (
                $item
            ) use ($locale) {
                return [
                    'image' => $item['image'] ?? '',
                    'des' => $item['des'][$locale] ?? '',
                ];
            }, $this->assurance_and_compliance_image_des),
        ];
    }
}
