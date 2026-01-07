<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use App\Http\Resources\Admin\TeamMemberResource;
use App\Models\TeamMember;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamMembersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('team_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamMemberResource(TeamMember::all());
    }

    public function store(StoreTeamMemberRequest $request)
    {
        $teamMember = TeamMember::create($request->all());

        if ($request->input('photo', false)) {
            $teamMember->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new TeamMemberResource($teamMember))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TeamMember $teamMember)
    {
        abort_if(Gate::denies('team_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamMemberResource($teamMember);
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

        return (new TeamMemberResource($teamMember))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TeamMember $teamMember)
    {
        abort_if(Gate::denies('team_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamMember->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
