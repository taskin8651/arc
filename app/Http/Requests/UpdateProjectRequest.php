<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'client_name' => [
                'string',
                'nullable',
            ],
            'conclusion' => [
                'string',
                'nullable',
            ],
            'year' => [
                'string',
                'nullable',
            ],
            'site_area' => [
                'string',
                'nullable',
            ],
            'project_space' => [
                'string',
                'nullable',
            ],
            'total_manpower' => [
                'string',
                'nullable',
            ],
            'estimate_cost' => [
                'string',
                'nullable',
            ],
        ];
    }
}
