@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.service.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.id') }}
                        </th>
                        <td>
                            {{ $service->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.title') }}
                        </th>
                        <td>
                            {{ $service->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.slug') }}
                        </th>
                        <td>
                            {{ $service->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.short_description') }}
                        </th>
                        <td>
                            {{ $service->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.description') }}
                        </th>
                        <td>
                            {{ $service->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.image') }}
                        </th>
                        <td>
                            @if($service->image)
                                <a href="{{ $service->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $service->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.price_range') }}
                        </th>
                        <td>
                            {{ $service->price_range }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Service::STATUS_SELECT[$service->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.add_pdf') }}
                        </th>
                        <td>
                            @if($service->add_pdf)
                                <a href="{{ $service->add_pdf->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.add_doc') }}
                        </th>
                        <td>
                            @if($service->add_doc)
                                <a href="{{ $service->add_doc->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.gallery_1') }}
                        </th>
                        <td>
                            @if($service->gallery_1)
                                <a href="{{ $service->gallery_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $service->gallery_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.gallery_2') }}
                        </th>
                        <td>
                            @if($service->gallery_2)
                                <a href="{{ $service->gallery_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $service->gallery_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection