@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teamMember.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.id') }}
                        </th>
                        <td>
                            {{ $teamMember->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.name') }}
                        </th>
                        <td>
                            {{ $teamMember->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.designation') }}
                        </th>
                        <td>
                            {{ $teamMember->designation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.bio') }}
                        </th>
                        <td>
                            {{ $teamMember->bio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.photo') }}
                        </th>
                        <td>
                            @if($teamMember->photo)
                                <a href="{{ $teamMember->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $teamMember->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.facebook_url') }}
                        </th>
                        <td>
                            {{ $teamMember->facebook_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.linkedin_url') }}
                        </th>
                        <td>
                            {{ $teamMember->linkedin_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.instagram_url') }}
                        </th>
                        <td>
                            {{ $teamMember->instagram_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMember.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\TeamMember::STATUS_SELECT[$teamMember->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection