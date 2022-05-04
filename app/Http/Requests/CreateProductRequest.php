<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products|min:0|max:255',
            'code' => 'required|string|unique:products|min:1|max:24',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('name.required'),
            'name.unique' => trans('name.unique'),
            'name.min' => trans('name.unique'),
            'name.max' => trans('name.unique'),
            'code.required' => trans('code.required'),
            'code.unique' => trans('code.unique'),
            'code.min' => trans('code.min'),
            'code.max' => trans('code.max'),
            'category_id.exists' => trans('cat.exists'),
            'price.required' => trans('price.required'),
            'price.min' => trans('price.min'),
            'price.max' => trans('price.max'),
            'images.required' => trans('images.required'),
            'description.required' => trans('description.required'),
        ];
    }
}
