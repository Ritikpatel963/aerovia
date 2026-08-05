<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'text' => 'required|string',
            'avatar_url' => 'nullable|string',
            'avatar_file' => 'nullable|image|max:2048',
        ]);

        $avatarUrl = null;

        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $avatarUrl = asset('uploads/' . $filename);
        } elseif ($request->filled('avatar_url')) {
            $avatarUrl = $request->input('avatar_url');
        }

        $testimonial = Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'text' => $request->text,
            'avatar' => $avatarUrl,
        ]);

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial removed successfully!');
    }
}
