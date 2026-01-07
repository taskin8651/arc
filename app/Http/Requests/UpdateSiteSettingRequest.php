<?php

namespace App\Http\Requests;

use App\Models\SiteSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_setting_edit');
    }

    public function rules()
    {
        return [
            'site_name' => [
                'string',
                'nullable',
            ],
            'footer_text' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'email' => [
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
            'google_analytics_code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
