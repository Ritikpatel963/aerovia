<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultTestimonials = [
            [
                'name' => "Sarah Connor",
                'role' => "Frequent Explorer",
                'text' => "Aerovia made our trip to Poland & Czechia completely effortless! The custom itinerary was flawless and the tour guide care was exceptional.",
                'avatar' => "https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fm=webp&fit=crop&w=200&q=80"
            ],
            [
                'name' => "Michael Vance",
                'role' => "Corporate Traveler",
                'text' => "Our family tour in Norway was unforgettable. Everything from private fjord cruises to luxury lodging was arranged with deep personal care.",
                'avatar' => "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fm=webp&fit=crop&w=200&q=80"
            ],
            [
                'name' => "David Miller",
                'role' => "Verified Guest",
                'text' => "Aerovia's 40+ years heritage shines through in every detail. Their team handled our Schengen visa and flight bookings without a hitch.",
                'avatar' => "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fm=webp&fit=crop&w=200&q=80"
            ]
        ];

        foreach ($defaultTestimonials as $test) {
            Testimonial::firstOrCreate(
                ['name' => $test['name'], 'role' => $test['role']],
                ['text' => $test['text'], 'avatar' => $test['avatar']]
            );
        }
    }
}
