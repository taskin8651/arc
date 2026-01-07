<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class ServiceController extends Controller
{
    // All services
    public function index()
    {
        $services = Service::where('status', 'active')->get();
        $testimonials = Testimonial::where('status', 'active')->get();

        return view('custom.services', compact('services', 'testimonials'));
    }

    // Single service details
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('custom.service-detail', compact('service'));
    }
}
