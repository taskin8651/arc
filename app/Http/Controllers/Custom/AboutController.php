<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Faq;

class AboutController extends Controller
{
          public function index()
    {
        // Active team members
        $teamMembers = TeamMember::where('status', 'active')->get();

        // Active testimonials
        $testimonials = Testimonial::where('status', 'active')->get();

        $faqs = Faq::all();

        return view('custom.about', compact('teamMembers', 'testimonials', 'faqs'));
    }

}
