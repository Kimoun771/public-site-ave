<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactSettings extends Settings
{
    public string $hero_image = '';
    public array $title = [];
    public array $description = [];
    public array $contact_info = [];

    public static function group(): string
    {
        return 'contact';
    }

    public function getFormattedSettings(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();

        return [
            'hero_image' => $this->hero_image,
            'title' => $this->getTranslation('title', $locale),
            'description' => $this->getTranslation('description', $locale),
            'contact_info' => $this->getFormattedContactInfo($locale),
        ];
    }

    public function getFormattedContactInfo(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();

        return array_map(
            fn($item) => [
                'name' => $this->getNestedTranslation($item, 'name', $locale),
                'phone' => $item['phone'] ?? '',
                'email' => $item['email'] ?? '',
                'address' => $this->getNestedTranslation(
                    $item,
                    'address',
                    $locale
                ),
                'working_hour' => $this->getNestedTranslation(
                    $item,
                    'working_hour',
                    $locale
                ),
                'map_url' => $item['map_url'] ?? '',
            ],
            $this->contact_info
        );
    }

    public function getTranslation(string $attribute, string $locale): ?string
    {
        return $this->isValidTranslatableAttribute($attribute)
            ? $this->{$attribute}[$locale] ??
                    ($this->{$attribute}['en'] ?? null)
            : null;
    }

    public function setTranslation(
        string $attribute,
        string $locale,
        string $value
    ): self {
        if (!is_array($this->{$attribute})) {
            $this->{$attribute} = [];
        }

        $this->{$attribute}[$locale] = $value;
        return $this;
    }

    public function hasTranslation(string $attribute, string $locale): bool
    {
        return $this->isValidTranslatableAttribute($attribute) &&
            !empty($this->{$attribute}[$locale]);
    }

    public function getContactByLocation(
        string $locationName,
        ?string $locale = null
    ): ?array {
        $locale = $locale ?? app()->getLocale();

        foreach ($this->contact_info as $item) {
            $name = $this->getNestedTranslation($item, 'name', $locale);

            if ($name && strtolower($name) === strtolower($locationName)) {
                return [
                    'name' => $name,
                    'phone' => $item['phone'] ?? '',
                    'email' => $item['email'] ?? '',
                    'address' => $this->getNestedTranslation(
                        $item,
                        'address',
                        $locale
                    ),
                    'working_hour' => $this->getNestedTranslation(
                        $item,
                        'working_hour',
                        $locale
                    ),
                    'map_url' => $item['map_url'] ?? '',
                ];
            }
        }

        return null;
    }

    public function addContactLocation(array $locationData): self
    {
        $this->contact_info[] = $locationData;
        return $this;
    }

    public function updateContactLocation(int $index, array $locationData): self
    {
        if (isset($this->contact_info[$index])) {
            $this->contact_info[$index] = array_merge(
                $this->contact_info[$index],
                $locationData
            );
        }

        return $this;
    }

    public function removeContactLocation(int $index): self
    {
        if (isset($this->contact_info[$index])) {
            unset($this->contact_info[$index]);
            $this->contact_info = array_values($this->contact_info);
        }

        return $this;
    }

    public function getContactLocationsCount(): int
    {
        return count($this->contact_info);
    }

    public function getTranslatableAttributes(): array
    {
        return ['title', 'description'];
    }

    public function getAvailableLocales(): array
    {
        $locales = collect();
        foreach ($this->getTranslatableAttributes() as $attribute) {
            if (is_array($this->{$attribute})) {
                $locales = $locales->merge(array_keys($this->{$attribute}));
            }
        }
        foreach ($this->contact_info as $item) {
            $translatableFields = ['name', 'address', 'working_hour'];

            foreach ($translatableFields as $field) {
                if (isset($item[$field]) && is_array($item[$field])) {
                    $locales = $locales->merge(array_keys($item[$field]));
                }
            }
        }

        return $locales->unique()->values()->toArray();
    }

    private function getNestedTranslation(
        array $item,
        string $field,
        string $locale
    ): ?string {
        $translations = $item[$field] ?? [];

        return is_array($translations)
            ? $translations[$locale] ?? ($translations['en'] ?? null)
            : null;
    }

    private function isValidTranslatableAttribute(string $attribute): bool
    {
        return isset($this->{$attribute}) && is_array($this->{$attribute});
    }
}
