<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Settings\ServiceSetting;
use App\Settings\InspectionSettings;
use App\Settings\TrainingSettings;
use App\Settings\HomeSettings;
use App\Settings\ContactSettings;
use App\Settings\AboutSettings;
use App\Settings\SeoSettings;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;


class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user() ? UserResource::make($request->user()) : null,
                'isLoggedIn' => $request->user() !== null,
                'roles' => $request->user()?->roles->pluck('name'),
            ],
            'flash' => [
                'success' => fn() => $request->session()->get('success'),
                'error' => fn() => $request->session()->get('error'),
            ],
            'app' => [
                'name' => config('app.name'),
                'url' => config('app.url'),
            ],
            'settings' =>  $this->getCurrentDataSetting(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'currentLocale' => LaravelLocalization::getCurrentLocale(),
            'locales' => LaravelLocalization::getSupportedLocales(),
            'dir' => LaravelLocalization::getCurrentLocaleDirection(),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
    /**
     * The root template that is loaded on the first page visit.
     *
     * @return string
     */

     /**
      * Get current page settings data.
      *
      * @return array
      */
     private function getCurrentDataSetting(): array
     {
        // Get the current page URL and path
        $request = request();
        $currentUrl = $request->url();
        $path = parse_url($currentUrl, PHP_URL_PATH);

        // Parse the URL to extract segments
        $segments = explode('/', trim($path, '/'));

        // Get the page identifier (last non-locale segment)
        $pageIdentifier = '';
        if (count($segments) > 0) {
            $lastSegment = end($segments);

            // If the last segment is a locale, use the segment before it
            if (in_array($lastSegment, array_keys(LaravelLocalization::getSupportedLocales()))) {
                $previousIndex = count($segments) - 2;
                if ($previousIndex >= 0) {
                    $pageIdentifier = $segments[$previousIndex];
                }
            } else {
                $pageIdentifier = $lastSegment;
            }
        }


        // Get SEO data for the current page
        $seoData = app(SeoSettings::class)->getFormattedSettings();

        // Return the appropriate page data based on the URL segment
        return match($pageIdentifier) {
            'service' => [
                'service' => app(ServiceSetting::class)->getFormattedSettings(),
                'seo' => $seoData,
            ],
            'inspection' => [
                'inspection' => app(InspectionSettings::class)->getFormattedSettings(),
                'seo' => $seoData,
            ],
            'training' => [
                'training' => app(TrainingSettings::class)->getFormattedSettings(),
                'seo' => $seoData,
            ],
            'about' => [
                'about' => app(AboutSettings::class)->getFormattedSettings(),
                'seo' => $seoData,
            ],
            'contact' => [
                'contact' => app(ContactSettings::class)->getFormattedSettings(),
                'seo' => $seoData,
            ],
            default => [
                'seo' => $seoData,
                'home' => app(HomeSettings::class)->getFormattedSettings(),
                'service_homepage' => app(
                    ServiceSetting::class
                )->getFormattedSettings(),
            ],
        };
     }
}
