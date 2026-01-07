<?php

namespace App\Http\Requests;

use App\Models\ContactEnquiry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactEnquiryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_enquiry_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'degination' => [
                'string',
                'nullable',
            ],
        ];
    }
}
