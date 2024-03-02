<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=> 'required|string|unique:shorten_urls,title',
            'original_url' => 'required|string|unique:shorten_urls,original_url'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please enter url title',
            'title.unique' => 'Url with this title has already exist!',
            'original_url.required'=>'Please enter url',
            'original_url.unique' => 'Url has already exist!',
        ];
    }
}
