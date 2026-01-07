<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectCategoryRequest;
use App\Http\Requests\StoreProjectCategoryRequest;
use App\Http\Requests\UpdateProjectCategoryRequest;
use App\Models\ProjectCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectCategoriesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('project_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectCategories = ProjectCategory::with(['media'])->get();

        return view('admin.projectCategories.index', compact('projectCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectCategories.create');
    }

    public function store(StoreProjectCategoryRequest $request)
    {
        $projectCategory = ProjectCategory::create($request->all());

        if ($request->input('image', false)) {
            $projectCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $projectCategory->id]);
        }

        return redirect()->route('admin.project-categories.index');
    }

    public function edit(ProjectCategory $projectCategory)
    {
        abort_if(Gate::denies('project_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectCategories.edit', compact('projectCategory'));
    }

    public function update(UpdateProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $projectCategory->update($request->all());

        if ($request->input('image', false)) {
            if (! $projectCategory->image || $request->input('image') !== $projectCategory->image->file_name) {
                if ($projectCategory->image) {
                    $projectCategory->image->delete();
                }
                $projectCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($projectCategory->image) {
            $projectCategory->image->delete();
        }

        return redirect()->route('admin.project-categories.index');
    }

    public function show(ProjectCategory $projectCategory)
    {
        abort_if(Gate::denies('project_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectCategories.show', compact('projectCategory'));
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        abort_if(Gate::denies('project_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectCategoryRequest $request)
    {
        $projectCategories = ProjectCategory::find(request('ids'));

        foreach ($projectCategories as $projectCategory) {
            $projectCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_category_create') && Gate::denies('project_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProjectCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
