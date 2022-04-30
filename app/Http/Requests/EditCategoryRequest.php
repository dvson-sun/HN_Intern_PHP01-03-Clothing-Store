<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories',
            'parent' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('name.required'),
            'name.unique' => trans('name.unique'),
            'parent.required' => trans('parent.required'),
        ];
    }
}
