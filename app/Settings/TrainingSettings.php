<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class TrainingSettings extends Settings
{
    public string $hero_image = '';
    public array $title = [];
    public array $description = [];
    public array $training_title = [];
    public array $training_program_image_des = [];
    public array $consulting_services_title = [];
    public array $consulting_services_image_des = [];

    /**
     * Group name used to identify this setting in the database.
     */
    public static function group(): string
    {
        return 'training';
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
            'training_title' => $this->getTranslationForLocale(
                'training_title',
                $locale
            ),
            'consulting_services_title' => $this->getTranslationForLocale(
                'consulting_services_title',
                $locale
            ),
            'training_program_image_des' => array_map(function ($item) use (
                $locale
            ) {
                return [
                    'image' => $item['image'] ?? '',
                    'des' => $item['des'][$locale] ?? '',
                ];
            }, $this->training_program_image_des),
            'consulting_services_image_des' => array_map(function ($item) use (
                $locale
            ) {
                return [
                    'image' => $item['image'] ?? '',
                    'des' => $item['des'][$locale] ?? '',
                ];
            }, $this->consulting_services_image_des),
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
