<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testimonials = \App\Models\Testimonial::all();
    if ($testimonials->isEmpty()) {
        $testimonials = collect([
            (object)[
                'name' => "Sarah Connor",
                'role' => "Frequent Explorer",
                'text' => "Aerovia made our trip to Poland & Czechia completely effortless! The custom itinerary was flawless and the tour guide care was exceptional.",
                'avatar' => "https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fm=webp&fit=crop&w=200&q=80"
            ],
            (object)[
                'name' => "Michael Vance",
                'role' => "Corporate Traveler",
                'text' => "Our family tour in Norway was unforgettable. Everything from private fjord cruises to luxury lodging was arranged with deep personal care.",
                'avatar' => "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fm=webp&fit=crop&w=200&q=80"
            ],
            (object)[
                'name' => "David Miller",
                'role' => "Verified Guest",
                'text' => "Aerovia's 40+ years heritage shines through in every detail. Their team handled our Schengen visa and flight bookings without a hitch.",
                'avatar' => "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fm=webp&fit=crop&w=200&q=80"
            ]
        ]);
    }
    return view('home', compact('testimonials'));
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

        Route::get('/testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('admin.testimonials');
        Route::post('/testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('admin.testimonials.store');
        Route::delete('/testimonials/{testimonial}', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

        Route::get('/banner-details', function () {
            return view('admin.banner-details');
        })->name('admin.banner-details');
    });
});
