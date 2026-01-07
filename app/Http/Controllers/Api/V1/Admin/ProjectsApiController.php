<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\Admin\ProjectResource;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource(Project::with(['category'])->get());
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($request->input('gallery', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery'))))->toMediaCollection('gallery');
        }

        if ($request->input('gallery_1', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_1'))))->toMediaCollection('gallery_1');
        }

        if ($request->input('gallery_2', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_2'))))->toMediaCollection('gallery_2');
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource($project->load(['category']));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        if ($request->input('gallery', false)) {
            if (! $project->gallery || $request->input('gallery') !== $project->gallery->file_name) {
                if ($project->gallery) {
                    $project->gallery->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery'))))->toMediaCollection('gallery');
            }
        } elseif ($project->gallery) {
            $project->gallery->delete();
        }

        if ($request->input('gallery_1', false)) {
            if (! $project->gallery_1 || $request->input('gallery_1') !== $project->gallery_1->file_name) {
                if ($project->gallery_1) {
                    $project->gallery_1->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_1'))))->toMediaCollection('gallery_1');
            }
        } elseif ($project->gallery_1) {
            $project->gallery_1->delete();
        }

        if ($request->input('gallery_2', false)) {
            if (! $project->gallery_2 || $request->input('gallery_2') !== $project->gallery_2->file_name) {
                if ($project->gallery_2) {
                    $project->gallery_2->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_2'))))->toMediaCollection('gallery_2');
            }
        } elseif ($project->gallery_2) {
            $project->gallery_2->delete();
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
