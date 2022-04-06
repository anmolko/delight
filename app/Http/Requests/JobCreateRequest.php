<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobCreateRequest extends FormRequest
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
            'slug'=> 'required|unique:jobs',
        ];
    }

    public function messages()
    {
        return [
            'slug.required'=> 'Please Enter a Slug',
            'slug.unique'=> 'The Slug Has Been Already Used',
        ];
    }
}
