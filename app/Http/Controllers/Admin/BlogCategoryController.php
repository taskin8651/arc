<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBlogCategoryRequest;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogCategoryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogCategories = BlogCategory::all();

        return view('admin.blogCategories.index', compact('blogCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('blog_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogCategories.create');
    }

    public function store(StoreBlogCategoryRequest $request)
    {
        $blogCategory = BlogCategory::create($request->all());

        return redirect()->route('admin.blog-categories.index');
    }

    public function edit(BlogCategory $blogCategory)
    {
        abort_if(Gate::denies('blog_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogCategories.edit', compact('blogCategory'));
    }

    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $blogCategory->update($request->all());

        return redirect()->route('admin.blog-categories.index');
    }

    public function show(BlogCategory $blogCategory)
    {
        abort_if(Gate::denies('blog_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogCategories.show', compact('blogCategory'));
    }

    public function destroy(BlogCategory $blogCategory)
    {
        abort_if(Gate::denies('blog_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogCategoryRequest $request)
    {
        $blogCategories = BlogCategory::find(request('ids'));

        foreach ($blogCategories as $blogCategory) {
            $blogCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
