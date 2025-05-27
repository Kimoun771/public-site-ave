<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Settings\ServiceSetting;
use App\Settings\InspectionSettings;
use App\Settings\TrainingSettings;
use App\Settings\HomeSettings;
use App\Settings\ContactSettings;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
        return [
            ...parent::share($request),
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
        ];
    }
    /**
     * The root template that is loaded on the first page visit.
     *
     * @return string
     */

     private function getCurrentDataSetting()
     {
        // Get the current page URL
        $currentUrl = url()->current();
        // Parse the URL to extract the last segment
        $path = parse_url($currentUrl, PHP_URL_PATH);
        $segments = explode('/', $path);
        $lastSegment = end($segments);

        // If there's a locale prefix like 'en', get the segment after it
        if (in_array($lastSegment, array_keys(LaravelLocalization::getSupportedLocales()))) {
            $previousSegment = prev($segments);
            if ($previousSegment) {
            $lastSegment = $previousSegment;
            }
        }

        // Return the appropriate page based on the URL segment
        return match($lastSegment) {
            'service' =>  app(ServiceSetting::class)->getFormattedSettings(),
            'inspection' => app(InspectionSettings::class)->getFormattedSettings(),
            'training' => app(TrainingSettings::class)->getFormattedSettings(),
            'about' => 'About',
            'contact' => app(ContactSettings::class)->getFormattedSettings(),
            default => [
                'home' => app(HomeSettings::class)->getFormattedSettings(),
                'service_homepage' => app(
                    ServiceSetting::class
                )->getFormattedSettings(),
            ],
        };
     }
}
