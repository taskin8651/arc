<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTeamMemberRequest;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use App\Models\TeamMember;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TeamMembersController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('team_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamMembers = TeamMember::with(['media'])->get();

        return view('admin.teamMembers.index', compact('teamMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teamMembers.create');
    }

    public function store(StoreTeamMemberRequest $request)
    {
        $teamMember = TeamMember::create($request->all());

        if ($request->input('photo', false)) {
            $teamMember->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $teamMember->id]);
        }

        return redirect()->route('admin.team-members.index');
    }

    public function edit(TeamMember $teamMember)
    {
        abort_if(Gate::denies('team_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teamMembers.edit', compact('teamMember'));
    }

    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        $teamMember->update($request->all());

        if ($request->input('photo', false)) {
            if (! $teamMember->photo || $request->input('photo') !== $teamMember->photo->file_name) {
                if ($teamMember->photo) {
                    $teamMember->photo->delete();
                }
                $teamMember->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($teamMember->photo) {
            $teamMember->photo->delete();
        }

        return redirect()->route('admin.team-members.index');
    }

    public function show(TeamMember $teamMember)
    {
        abort_if(Gate::denies('team_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teamMembers.show', compact('teamMember'));
    }

    public function destroy(TeamMember $teamMember)
    {
        abort_if(Gate::denies('team_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamMember->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamMemberRequest $request)
    {
        $teamMembers = TeamMember::find(request('ids'));

        foreach ($teamMembers as $teamMember) {
            $teamMember->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('team_member_create') && Gate::denies('team_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TeamMember();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
