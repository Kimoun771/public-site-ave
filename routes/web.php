<?php

use App\Http\Controllers\CountryController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::feeds();

//        Route::get('/', [HomeController::class, 'index'])->name('welcome');
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

        Route::get('/', function () {
            return Inertia::render('Home');
        })->name('home');

        Route::get('/service', function () {
            return Inertia::render('Service');
        })->name('service');

        Route::get('/inspection', [CountryController::class,'create'])->name('inspection');

        Route::get('/training', function () {
            return Inertia::render('Training');
        })->name('training');

        Route::get('/about', function () {
            return Inertia::render('About');
        })->name('about');

        Route::get('/contact', function () {
            return Inertia::render('Contact');
        })->name('contact');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';
    }
);
