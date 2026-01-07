<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\BlogPost;
use App\Models\NewsletterSubscriber;
class IndexController extends Controller
{
    public function index()
    {
        // सिर्फ active services fetch करें
        $services = Service::where('status', 'active')->get();

           $projects = Project::with('category')
        ->where('status', 'approved')
        ->latest()
        ->get();

              // सिर्फ active team members fetch करें
        $teamMembers = TeamMember::where('status', 'active')->get();

         $testimonials = Testimonial::where('status', 'active')->get();
          $blogPosts = BlogPost::where('status', 'published')
                         ->orderBy('created_at', 'desc')
                         ->take(3) // जितने posts slider में दिखाना चाहते हैं
                         ->get();

        return view('custom.index', compact('services', 'projects', 'teamMembers', 'testimonials', 'blogPosts'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Thank you for subscribing!');
    }
}
