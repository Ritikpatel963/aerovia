<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/tours', function () {
    return view('tours');
});

Route::get('/tour-description', function () {
    return view('tour-description');
});

Route::get('/contact', function () {
    return view('contact');
});

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\BannerController;

Route::prefix('admin')->group(function () {
    // Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', function () {
            return view('admin.login');
        })->name('login');
        
        Route::post('/login', [AuthController::class, 'login']);
    });

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        // Redirect old URL to new URL
        Route::get('/add-tour', function () {
            return redirect()->route('tours.create');
        });

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Tour Management
        Route::get('/dashboard', [TourController::class, 'index'])->name('admin.dashboard');
        Route::resource('tours', TourController::class)->except(['index', 'show']);

        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('admin.settings');

        Route::get('/testimonials', function () {
            return view('admin.testimonials');
        })->name('admin.testimonials');

        Route::get('/banner-details', [BannerController::class, 'index'])->name('admin.banner-details');
        Route::post('/banner-details', [BannerController::class, 'store'])->name('admin.banners.store');
    });
});
