<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // All Projects List
 public function index(Request $request)
{
    $categoryId = $request->get('category_id');

    // Fetch categories with project counts
    $categories = ProjectCategory::withCount('projects')->get();

    // Base query
    $query = Project::with('category')
        ->where('status', 'approved')
        ->latest();

    // Filter by category if provided
    if ($categoryId) {
        $query->where('category_id', $categoryId);
    }

    $projects = $query->get();

    return view('custom.project', compact('projects', 'categories', 'categoryId'));
}




    // Single Project
    public function show($slug)
    {
        $project = Project::with('category')->where('slug', $slug)->firstOrFail();
        return view('custom.project-details', compact('project'));
    }
}
