<?php

namespace App\Http\Requests;

use App\Models\NewsletterSubscriber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewsletterSubscriberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newsletter_subscriber_create');
    }

    public function rules()
    {
        return [
            'email' => [
                'string',
                'nullable',
            ],
        ];
    }
}
