<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'site_name' => 'required|string|max:190',
            'tagline' => 'required|string|max:190',
            'owner_name' => 'required|string|max:190',
            'owner_email' => 'required|email|max:190',
            'twitter' => 'required|string|max:190',
            'facebook' => 'required|string|max:190',
            'instagram' => 'required|string|max:190',
            'theme_directory' => 'required|string|max:190',
            'is_cookieconsent' => 'required',
            'is_infinitescroll' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => __('A site title is required'),
            'tagline.required' => __('A site tag line is required'),
            'owner_name.required' => __('Please provide a site owner/company name'),
            'owner_email.required' => __('A valid email is required'),
            'owner_email.email' => __('The email you provided is not valid'),
            'twitter.required' => __('Twitter is required'),
            'facebook.required' => __('Facebook is required'),
            'instagram.required' => __('Instagram is required'),
            'theme_directory.required' => __('The theme directory is required.'),
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_cookieconsent' => $this->is_cookieconsent == 'on' ? 1 : 0,
            'is_infinitescroll' => $this->is_infinitescroll == 'on' ? 1 : 0,
        ]);
    }
}
