<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $settings = Gallery::pluck('value', 'key')->toArray();
        $sceneryList = isset($settings['scenery_images']) ? json_decode($settings['scenery_images'], true) : [];
        $tours = \App\Models\Tour::select('title', 'subtitle')->get();
        
        return view('admin.banner-details', compact('settings', 'sceneryList', 'tours'));
    }

    public function store(Request $request)
    {
        $keys = [
            'home_video', 'home_poster', 'about_banner', 
            'services_banner', 'tours_banner', 'contact_banner'
        ];

        // Handle single file uploads
        foreach ($keys as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('banners', 'public');
                
                Gallery::updateOrCreate(
                    ['key' => $key],
                    ['value' => $path]
                );
            }
        }

        // Handle scenery array
        $sceneryData = $request->input('scenery', []);
        $sceneryFiles = $request->file('scenery');
        
        $processedScenery = [];
        
        if (is_array($sceneryData)) {
            foreach ($sceneryData as $index => $item) {
                $imagePath = $item['image_url'] ?? ''; // Existing URL
                
                // If a new file was uploaded for this scenery item
                if (isset($sceneryFiles[$index]['file'])) {
                    $file = $sceneryFiles[$index]['file'];
                    $imagePath = $file->store('banners', 'public');
                }
                
                $processedScenery[] = [
                    'title' => $item['title'] ?? '',
                    'subtitle' => $item['subtitle'] ?? '',
                    'image' => $imagePath
                ];
            }
            
            Gallery::updateOrCreate(
                ['key' => 'scenery_images'],
                ['value' => json_encode($processedScenery)]
            );
        }

        return redirect()->back()->with('success', 'Banners and Media updated successfully.');
    }
}
