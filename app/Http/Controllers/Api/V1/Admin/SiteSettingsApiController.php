<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSiteSettingRequest;
use App\Http\Requests\UpdateSiteSettingRequest;
use App\Http\Resources\Admin\SiteSettingResource;
use App\Models\SiteSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('site_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SiteSettingResource(SiteSetting::all());
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

        return (new SiteSettingResource($siteSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SiteSettingResource($siteSetting);
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

        return (new SiteSettingResource($siteSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
