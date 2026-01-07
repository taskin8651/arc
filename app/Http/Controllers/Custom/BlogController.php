<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Blog Listing
    public function index(Request $request)
    {
       $blogs = BlogPost::where('status', 'published')
    ->orderBy('created_at', 'desc') // ✅ Use created_at
    ->paginate(6);




        return view('custom.blog', compact('blogs'));
    }

    public function show($id)
    {
       $blog = BlogPost::where('id', $id)
        ->where('status', 'published')
        ->firstOrFail();

    $recentBlogs = BlogPost::where('status', 'published')
        ->where('id', '!=', $blog->id)
        ->orderBy('created_at', 'desc') // use created_at since published_at doesn't exist
        ->limit(5)
        ->get();

       

        return view('custom.blog-details', compact('blog', 'recentBlogs'));
    }
}
