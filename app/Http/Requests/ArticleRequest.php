<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'category_id' => 'required|exists:article_categories,id',
            'title' => 'required|string|max:190',
            'short_description' => 'required|string|max:190',
            'image' =>  'image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => __('Please pick a category for the article'),
            'title.required' => __('Please provide a title for the article'),
            'short_description.required' => __('The article needs a short description'),
            'short_description.max' => __('The short description field is too long'),
            'content.required' => __('Please add content')
        ];
    }
}
