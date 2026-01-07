<?php

namespace App\Http\Requests;

use App\Models\TeamMember;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTeamMemberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_member_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'designation' => [
                'string',
                'nullable',
            ],
            'facebook_url' => [
                'string',
                'nullable',
            ],
            'linkedin_url' => [
                'string',
                'nullable',
            ],
            'instagram_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
