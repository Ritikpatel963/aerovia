<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Faq;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $faqs = Faq::orderBy('sort_order')->get();
        
        return view('admin.settings', compact('settings', 'faqs'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'faqs']);
        
        // Save General Settings
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Save FAQs
        Faq::truncate();
        if ($request->has('faqs')) {
            foreach ($request->faqs as $index => $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    Faq::create([
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                        'sort_order' => $index
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Your contact details, social links, and updated FAQs are saved and live on the main website.');
    }
}
