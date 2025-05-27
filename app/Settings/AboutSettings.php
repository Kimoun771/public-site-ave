<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutSettings extends Settings
{
    public string $hero_image = '';
    public array $title = [];
    public array $description = [];
    public array $name = [];
    public array $image_des = [];

    private array $translatable = ['title', 'description', 'name'];

    public static function group(): string
    {
        return 'about';
    }

    public function getFormattedSettings(?string $locale = null): array
    {
        $locale ??= app()->getLocale();

        return [
            'hero_image' => $this->getHeroImageUrl(),
            'title' => $this->getTranslation($this->title, $locale),
            'description' => $this->getTranslation($this->description, $locale),
            'name' => $this->getTranslation($this->name, $locale),
            'image_des' => $this->getFormattedImageDescriptions($locale),
        ];
    }

    public function getImageDescription(
        int $index,
        ?string $locale = null
    ): ?array {
        if (!isset($this->image_des[$index])) {
            return null;
        }

        $locale ??= app()->getLocale();
        $item = $this->image_des[$index];

        return [
            'image' => $item['image'] ?? '',
            'title' => $this->getTranslation($item['title'] ?? [], $locale),
            'alt' => $this->getTranslation($item['alt'] ?? [], $locale),
            'description' => $this->getTranslation(
                $item['description'] ?? [],
                $locale
            ),
        ];
    }

    public function getHeroImageUrl(): string
    {
        return $this->hero_image ?? '';
    }

    public function setTranslations(
        string $attribute,
        array $translations
    ): void {
        if (in_array($attribute, $this->translatable, true)) {
            $this->$attribute = $translations;
        }
    }

    public function getAvailableLocales(): array
    {
        $locales = [];

        foreach ($this->translatable as $attribute) {
            if (is_array($this->$attribute)) {
                $locales = array_merge($locales, array_keys($this->$attribute));
            }
        }

        return array_unique($locales);
    }

    public function hasTranslation(string $attribute, string $locale): bool
    {
        return !empty($this->$attribute[$locale] ?? '');
    }

    private function getFormattedImageDescriptions(string $locale): array
    {
        return array_map(
            fn($item) => [
                'image' => $item['image'] ?? '',
                'title' => $this->getTranslation($item['title'] ?? [], $locale),
                'alt' => $this->getTranslation($item['alt'] ?? [], $locale),
                'description' => $this->getTranslation(
                    $item['description'] ?? [],
                    $locale
                ),
            ],
            $this->image_des
        );
    }

    private function getTranslation(
        $value,
        string $locale,
        string $fallback = 'en'
    ): string {
        if (is_string($value)) {
            return $value;
        }

        if (is_array($value)) {
            return $value[$locale] ?? ($value[$fallback] ?? '');
        }

        return '';
    }
}
