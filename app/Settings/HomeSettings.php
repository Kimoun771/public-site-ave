<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomeSettings extends Settings
{
    public array $slide_image_des = [];
    public array $vecert = [];
    public array $vecert_image_des = [];
    public array $our_client_image_des = [];

    /**
     * Group name used to identify this setting in the database.
     */
    public static function group(): string
    {
        return 'home';
    }

    /**
     * Return formatted settings based on the current locale.
     *
     * @return array<string, mixed>
     */
    public function getFormattedSettings(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();

        return [
            'slide_image_des' => array_map(function ($item) use ($locale) {
                return [
                    'image' => $item['image'] ?? [],
                    'title' => $this->getLocalizedValue(
                        $item['title'] ?? [],
                        $locale
                    ),
                    'description' => $this->getLocalizedValue(
                        $item['description'] ?? [],
                        $locale
                    ),
                ];
            }, $this->slide_image_des),
            'vecert' => (object) [
                'image' => $this->vecert[0]['image'] ?? '',
                'title' => $this->getLocalizedValue(
                    $this->vecert[0]['title'] ?? [],
                    $locale
                ),
                'description' => $this->getLocalizedValue(
                    $this->vecert[0]['description'] ?? [],
                    $locale
                ),
                'slug' => $this->getLocalizedValue(
                    $this->vecert[0]['slug'] ?? [],
                    $locale
                ),
            ],
            'vecert_image_des' => array_map(function ($item) use ($locale) {
                return [
                    'image' => $item['image'] ?? '',
                    'title' => $this->getLocalizedValue(
                        $item['title'] ?? [],
                        $locale
                    ),
                    'description' => $this->getLocalizedValue(
                        $item['description'] ?? [],
                        $locale
                    ),
                ];
            }, $this->vecert_image_des),
            'our_client_image_des' => [
                'images' => $this->our_client_image_des['images'] ?? [],
                'title' => $this->getLocalizedValue(
                    $this->our_client_image_des['title'] ?? [],
                    $locale
                ),
                'description' => $this->getLocalizedValue(
                    $this->our_client_image_des['description'] ?? [],
                    $locale
                ),
            ],
        ];
    }

    /**
     * Get slides for a specific locale
     */
    public function getSlides(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        return $this->getFormattedSettings($locale)['slide_image_des'];
    }

    /**
     * Get VE Cert items for a specific locale
     */
    public function getVeCertItems(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        return $this->getFormattedSettings($locale)['vecert'];
    }

    /**
     * Get VE Cert details for a specific locale
     */
    public function getVeCertDetails(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        return $this->getFormattedSettings($locale)['vecert_image_des'];
    }

    /**
     * Get client section data for a specific locale
     */
    public function getClientSection(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        return $this->getFormattedSettings($locale)['our_client_image_des'];
    }

    /**
     * Get translation for a specific locale with fallback
     *
     * @param string|array $value
     * @param string $locale
     * @param string $fallbackLocale
     * @return string
     */
    private function getLocalizedValue(
        $value,
        string $locale,
        string $fallbackLocale = 'en'
    ): string {
        if (is_string($value)) {
            return $value;
        }

        if (is_array($value)) {
            return $value[$locale] ?? ($value[$fallbackLocale] ?? '');
        }

        return '';
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
        if (!property_exists($this, $attribute)) {
            return null;
        }

        $value = $this->{$attribute};

        if (is_array($value) && isset($value[$locale])) {
            return $value[$locale];
        }

        return null;
    }

    /**
     * Check if setting has translations
     */
    public function hasTranslations(string $attribute): bool
    {
        if (!property_exists($this, $attribute)) {
            return false;
        }

        $value = $this->{$attribute};
        return is_array($value) && !empty($value);
    }

    /**
     * Get available locales for a setting
     */
    public function getAvailableLocales(string $attribute): array
    {
        if (!$this->hasTranslations($attribute)) {
            return [];
        }

        return array_keys($this->{$attribute});
    }
}
