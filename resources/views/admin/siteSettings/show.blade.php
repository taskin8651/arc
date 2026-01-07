@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.siteSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $siteSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.site_name') }}
                        </th>
                        <td>
                            {{ $siteSetting->site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.site_logo') }}
                        </th>
                        <td>
                            @if($siteSetting->site_logo)
                                <a href="{{ $siteSetting->site_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $siteSetting->site_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.favicon') }}
                        </th>
                        <td>
                            @if($siteSetting->favicon)
                                <a href="{{ $siteSetting->favicon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $siteSetting->favicon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.footer_text') }}
                        </th>
                        <td>
                            {{ $siteSetting->footer_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.address') }}
                        </th>
                        <td>
                            {{ $siteSetting->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.phone') }}
                        </th>
                        <td>
                            {{ $siteSetting->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.email') }}
                        </th>
                        <td>
                            {{ $siteSetting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.facebook_url') }}
                        </th>
                        <td>
                            {{ $siteSetting->facebook_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.linkedin_url') }}
                        </th>
                        <td>
                            {{ $siteSetting->linkedin_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.instagram_url') }}
                        </th>
                        <td>
                            {{ $siteSetting->instagram_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.google_analytics_code') }}
                        </th>
                        <td>
                            {{ $siteSetting->google_analytics_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.loction_url') }}
                        </th>
                        <td>
                            {{ $siteSetting->loction_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection