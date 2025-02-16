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
        return true;
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
            'content' => 'required|string',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please pick a category for the article',
            'category_id.exists' => 'Please pick a category for the article',
            'title.required' => 'Please provide a title for the article',
            'short_description.required' => 'The article needs a short description',
            'short_description.max' => 'The short description field is too long',
            'content.required' => 'Please add content',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg',
            'image.max' => 'The image may not be greater than 2048 kilobytes',
            'tags.required' => 'Please select at least one tag',
            'tags.*.exists' => 'Invalid tag selected',
        ];
    }
}
