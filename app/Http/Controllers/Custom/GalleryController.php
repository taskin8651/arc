<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
   public function index()
    {
        $galleries = Gallery::with('media')->get();
        return view('custom.gallery', compact('galleries'));
    }
}
