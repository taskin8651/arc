<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactEnquiry;
use App\Models\SiteSetting;

class ContactController extends Controller
{
    public function index()
    {
        // Site settings fetch
        $settings = SiteSetting::first(); // या जहां settings रखी हैं

        return view('custom.contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'degination' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactEnquiry::create($request->all());

        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
