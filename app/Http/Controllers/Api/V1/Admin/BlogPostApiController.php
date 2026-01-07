<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Http\Resources\Admin\BlogPostResource;
use App\Models\BlogPost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogPostApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogPostResource(BlogPost::all());
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

        return (new BlogPostResource($blogPost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BlogPost $blogPost)
    {
        abort_if(Gate::denies('blog_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogPostResource($blogPost);
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

        return (new BlogPostResource($blogPost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BlogPost $blogPost)
    {
        abort_if(Gate::denies('blog_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
