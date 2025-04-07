<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Model\Service;

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

        // PageController routes
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/service', [PageController::class, 'service'])->name('service');
        Route::get('/inspection', [PageController::class, 'inspection'])->name('inspection');
        Route::get('/training', [PageController::class, 'training'])->name('training');
        Route::get('/about', [PageController::class, 'about'])->name('about');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');

        // Dashboard route
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';
    }
);
