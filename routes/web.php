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
            return redirect('admin/dashboard');
        });

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/add-tour', function () {
            return view('admin.add-tour');
        })->name('admin.add-tour');

        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('admin.settings');

        Route::get('/testimonials', function () {
            return view('admin.testimonials');
        })->name('admin.testimonials');

        Route::get('/banner-details', function () {
            return view('admin.banner-details');
        })->name('admin.banner-details');
    });
});
