<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
			'name.required' => __('Please enter your name'),
			'email.required' => __('Please enter your email address'),
			'email.email' => __('Not a valid email address'),
			'phone.required' => __('Please enter your phone number'),
			'message.required' => __('Please enter a message')
        ];
    }
}
