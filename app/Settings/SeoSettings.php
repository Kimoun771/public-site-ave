<?php

namespace App\Settings;

use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\LaravelSettings\Settings;
use Illuminate\Support\Facades\Log;

class SeoSettings extends Settings
{
    public array $pages = [];

    public static function group(): string
    {
        return 'seo';
    }

    public function getFormattedSettings(): array
    {
        return $this->getSeoDataForPage(request());
    }

    /**
     * Get SEO data for the current page
     *
     * @param Request $request The current request
     * @return array SEO metadata for the current page
     */
    public function getSeoDataForPage(Request $request): array
    {
        // Get current path and strip locale prefix if present
        $currentPath = $request->path();
        $locale = LaravelLocalization::getCurrentLocale();

        // Handle home page
        if ($currentPath === '/' || $currentPath === $locale) {
            $currentPath = '';
        } else {
            // Remove locale prefix if present
            $localePrefix = $locale . '/';
            if (strpos($currentPath, $localePrefix) === 0) {
                $currentPath = substr($currentPath, strlen($localePrefix));
            }
        }

        // Clean the path
        $requestPath = trim($currentPath, '/');

        try {

            // Find matching page
            $pageSettings = collect($this->pages)->filter(function ($settings) use ($requestPath, $locale) {
                $settingsUrl = trim($settings['url'][$locale] ?? '', '/');


                return $settingsUrl === $requestPath;
            })->first();

            if ($pageSettings) {

                return [
                    'title' => $pageSettings['meta_title'][$locale] ?? '',
                    'description' => $pageSettings['meta_description'][$locale] ?? '',
                    'keywords' => $pageSettings['meta_keywords'][$locale] ?? '',
                    'canonical' => $request->url(),
                    'ogTitle' => $pageSettings['og_title'][$locale] ?? '',
                    'ogDescription' => $pageSettings['og_description'][$locale] ?? '',
                    'ogImage' => $this->getImageUrl($pageSettings['og_image'] ?? null),
                ];
            }

            return [
                'title' => config('app.name', 'Default Title'),
                'description' => 'Default description for the website',
                'keywords' => '',
                'canonical' => $request->url(),
                'ogTitle' => config('app.name', 'Default Title'),
                'ogDescription' => 'Default description for the website',
                'ogImage' => null,
            ];
        } catch (\Exception $e) {
            Log::error('SEO error', ['error' => $e->getMessage()]);
            return [];
        }
    }

    private function getImageUrl($image): ?string
    {
        if (empty($image)) {
            return null;
        }

        // Remove leading slash and ensure path is relative to storage
        $imagePath = ltrim($image, '/');
        return asset("/uploads/{$imagePath}");
    }
}