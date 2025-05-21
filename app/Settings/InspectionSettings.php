<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class InspectionSettings extends Settings
{
    public string $hero_image = '';
    public array $title = [];
    public array $description = [];
    public array $assurance_and_compliance_title = [];
    public array $assurance_and_compliance_description = [];
    public array $assurance_and_compliance_image_des = [];

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
            'title' => $this->getTranslationForLocale('title', $locale),
            'description' => $this->getTranslationForLocale(
                'description',
                $locale
            ),
            'hero_image' => $this->hero_image,
            'assurance_and_compliance_title' => $this->getTranslationForLocale(
                'assurance_and_compliance_title',
                $locale
            ),
            'assurance_and_compliance_description' => $this->getTranslationForLocale(
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

    /**
     * Get translation for a specific locale
     *
     * @param string $attribute
     * @param string $locale
     * @return string|null
     */
    protected function getTranslationForLocale(
        string $attribute,
        string $locale
    ): ?string {
        return $this->{$attribute}[$locale] ?? null;
    }
}
