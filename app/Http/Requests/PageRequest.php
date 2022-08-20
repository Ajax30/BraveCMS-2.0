<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:190',
            'content' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Please provide a title for the article'),
            'content.required' => __('Please add content')
        ];
    }
}
