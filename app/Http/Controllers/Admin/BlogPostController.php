<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BlogPostController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPosts = BlogPost::with(['media'])->get();

        return view('admin.blogPosts.index', compact('blogPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('blog_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogPosts.create');
    }

    public function store(StoreBlogPostRequest $request)
    {
        $blogPost = BlogPost::create($request->all());

        if ($request->input('gallary', false)) {
            $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary'))))->toMediaCollection('gallary');
        }

        if ($request->input('gallary_1', false)) {
            $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary_1'))))->toMediaCollection('gallary_1');
        }

        if ($request->input('gallary_2', false)) {
            $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary_2'))))->toMediaCollection('gallary_2');
        }

        if ($request->input('gallary_3', false)) {
            $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary_3'))))->toMediaCollection('gallary_3');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $blogPost->id]);
        }

        return redirect()->route('admin.blog-posts.index');
    }

    public function edit(BlogPost $blogPost)
    {
        abort_if(Gate::denies('blog_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogPosts.edit', compact('blogPost'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost)
    {
        $blogPost->update($request->all());

        if ($request->input('gallary', false)) {
            if (! $blogPost->gallary || $request->input('gallary') !== $blogPost->gallary->file_name) {
                if ($blogPost->gallary) {
                    $blogPost->gallary->delete();
                }
                $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary'))))->toMediaCollection('gallary');
            }
        } elseif ($blogPost->gallary) {
            $blogPost->gallary->delete();
        }

        if ($request->input('gallary_1', false)) {
            if (! $blogPost->gallary_1 || $request->input('gallary_1') !== $blogPost->gallary_1->file_name) {
                if ($blogPost->gallary_1) {
                    $blogPost->gallary_1->delete();
                }
                $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary_1'))))->toMediaCollection('gallary_1');
            }
        } elseif ($blogPost->gallary_1) {
            $blogPost->gallary_1->delete();
        }

        if ($request->input('gallary_2', false)) {
            if (! $blogPost->gallary_2 || $request->input('gallary_2') !== $blogPost->gallary_2->file_name) {
                if ($blogPost->gallary_2) {
                    $blogPost->gallary_2->delete();
                }
                $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary_2'))))->toMediaCollection('gallary_2');
            }
        } elseif ($blogPost->gallary_2) {
            $blogPost->gallary_2->delete();
        }

        if ($request->input('gallary_3', false)) {
            if (! $blogPost->gallary_3 || $request->input('gallary_3') !== $blogPost->gallary_3->file_name) {
                if ($blogPost->gallary_3) {
                    $blogPost->gallary_3->delete();
                }
                $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallary_3'))))->toMediaCollection('gallary_3');
            }
        } elseif ($blogPost->gallary_3) {
            $blogPost->gallary_3->delete();
        }

        return redirect()->route('admin.blog-posts.index');
    }

    public function show(BlogPost $blogPost)
    {
        abort_if(Gate::denies('blog_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogPosts.show', compact('blogPost'));
    }

    public function destroy(BlogPost $blogPost)
    {
        abort_if(Gate::denies('blog_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogPostRequest $request)
    {
        $blogPosts = BlogPost::find(request('ids'));

        foreach ($blogPosts as $blogPost) {
            $blogPost->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('blog_post_create') && Gate::denies('blog_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BlogPost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
