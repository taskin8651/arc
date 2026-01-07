@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.category') }}
                        </th>
                        <td>
                            {{ $project->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.title') }}
                        </th>
                        <td>
                            {{ $project->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.slug') }}
                        </th>
                        <td>
                            {{ $project->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.location') }}
                        </th>
                        <td>
                            {{ $project->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.client_name') }}
                        </th>
                        <td>
                            {{ $project->client_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {!! $project->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.short_description') }}
                        </th>
                        <td>
                            {{ $project->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.conclusion') }}
                        </th>
                        <td>
                            {{ $project->conclusion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.gallery') }}
                        </th>
                        <td>
                            @if($project->gallery)
                                <a href="{{ $project->gallery->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->gallery->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.gallery_1') }}
                        </th>
                        <td>
                            @if($project->gallery_1)
                                <a href="{{ $project->gallery_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->gallery_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.gallery_2') }}
                        </th>
                        <td>
                            @if($project->gallery_2)
                                <a href="{{ $project->gallery_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->gallery_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.video_url') }}
                        </th>
                        <td>
                            {{ $project->video_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.year') }}
                        </th>
                        <td>
                            {{ $project->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.site_area') }}
                        </th>
                        <td>
                            {{ $project->site_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_space') }}
                        </th>
                        <td>
                            {{ $project->project_space }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.total_manpower') }}
                        </th>
                        <td>
                            {{ $project->total_manpower }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.estimate_cost') }}
                        </th>
                        <td>
                            {{ $project->estimate_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Project::STATUS_SELECT[$project->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection