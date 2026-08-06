<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactLead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactLeadController extends Controller
{
    public function index()
    {
        $leads = ContactLead::latest()->get();
        return view('admin.contact-leads', compact('leads'));
    }
}
