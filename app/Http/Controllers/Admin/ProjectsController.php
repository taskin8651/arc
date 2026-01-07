<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::with(['category', 'media'])->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProjectCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact('categories'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $project->id]);
        }

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProjectCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('category');

        return view('admin.projects.edit', compact('categories', 'project'));
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

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('category');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        $projects = Project::find(request('ids'));

        foreach ($projects as $project) {
            $project->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
