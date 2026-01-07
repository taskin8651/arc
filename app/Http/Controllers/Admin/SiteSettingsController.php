<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySiteSettingRequest;
use App\Http\Requests\StoreSiteSettingRequest;
use App\Http\Requests\UpdateSiteSettingRequest;
use App\Models\SiteSetting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('site_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteSettings = SiteSetting::with(['media'])->get();

        return view('admin.siteSettings.index', compact('siteSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('site_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.create');
    }

    public function store(StoreSiteSettingRequest $request)
    {
        $siteSetting = SiteSetting::create($request->all());

        if ($request->input('site_logo', false)) {
            $siteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('site_logo'))))->toMediaCollection('site_logo');
        }

        if ($request->input('favicon', false)) {
            $siteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $siteSetting->id]);
        }

        return redirect()->route('admin.site-settings.index');
    }

    public function edit(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.edit', compact('siteSetting'));
    }

    public function update(UpdateSiteSettingRequest $request, SiteSetting $siteSetting)
    {
        $siteSetting->update($request->all());

        if ($request->input('site_logo', false)) {
            if (! $siteSetting->site_logo || $request->input('site_logo') !== $siteSetting->site_logo->file_name) {
                if ($siteSetting->site_logo) {
                    $siteSetting->site_logo->delete();
                }
                $siteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('site_logo'))))->toMediaCollection('site_logo');
            }
        } elseif ($siteSetting->site_logo) {
            $siteSetting->site_logo->delete();
        }

        if ($request->input('favicon', false)) {
            if (! $siteSetting->favicon || $request->input('favicon') !== $siteSetting->favicon->file_name) {
                if ($siteSetting->favicon) {
                    $siteSetting->favicon->delete();
                }
                $siteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
            }
        } elseif ($siteSetting->favicon) {
            $siteSetting->favicon->delete();
        }

        return redirect()->route('admin.site-settings.index');
    }

    public function show(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.show', compact('siteSetting'));
    }

    public function destroy(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroySiteSettingRequest $request)
    {
        $siteSettings = SiteSetting::find(request('ids'));

        foreach ($siteSettings as $siteSetting) {
            $siteSetting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('site_setting_create') && Gate::denies('site_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SiteSetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
