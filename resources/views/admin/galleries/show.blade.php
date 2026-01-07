@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gallery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.galleries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.id') }}
                        </th>
                        <td>
                            {{ $gallery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.name') }}
                        </th>
                        <td>
                            {{ $gallery->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.descrption') }}
                        </th>
                        <td>
                            {!! $gallery->descrption !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.image_1') }}
                        </th>
                        <td>
                            @if($gallery->image_1)
                                <a href="{{ $gallery->image_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $gallery->image_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.galleries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection