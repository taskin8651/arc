<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\Admin\ServiceResource;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource(Service::all());
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        if ($request->input('image', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('add_pdf', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('add_pdf'))))->toMediaCollection('add_pdf');
        }

        if ($request->input('add_doc', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('add_doc'))))->toMediaCollection('add_doc');
        }

        if ($request->input('gallery_1', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_1'))))->toMediaCollection('gallery_1');
        }

        if ($request->input('gallery_2', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_2'))))->toMediaCollection('gallery_2');
        }

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource($service);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        if ($request->input('image', false)) {
            if (! $service->image || $request->input('image') !== $service->image->file_name) {
                if ($service->image) {
                    $service->image->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($service->image) {
            $service->image->delete();
        }

        if ($request->input('add_pdf', false)) {
            if (! $service->add_pdf || $request->input('add_pdf') !== $service->add_pdf->file_name) {
                if ($service->add_pdf) {
                    $service->add_pdf->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('add_pdf'))))->toMediaCollection('add_pdf');
            }
        } elseif ($service->add_pdf) {
            $service->add_pdf->delete();
        }

        if ($request->input('add_doc', false)) {
            if (! $service->add_doc || $request->input('add_doc') !== $service->add_doc->file_name) {
                if ($service->add_doc) {
                    $service->add_doc->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('add_doc'))))->toMediaCollection('add_doc');
            }
        } elseif ($service->add_doc) {
            $service->add_doc->delete();
        }

        if ($request->input('gallery_1', false)) {
            if (! $service->gallery_1 || $request->input('gallery_1') !== $service->gallery_1->file_name) {
                if ($service->gallery_1) {
                    $service->gallery_1->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_1'))))->toMediaCollection('gallery_1');
            }
        } elseif ($service->gallery_1) {
            $service->gallery_1->delete();
        }

        if ($request->input('gallery_2', false)) {
            if (! $service->gallery_2 || $request->input('gallery_2') !== $service->gallery_2->file_name) {
                if ($service->gallery_2) {
                    $service->gallery_2->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_2'))))->toMediaCollection('gallery_2');
            }
        } elseif ($service->gallery_2) {
            $service->gallery_2->delete();
        }

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
