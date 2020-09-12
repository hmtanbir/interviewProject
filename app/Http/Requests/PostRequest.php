<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'description' => 'required'
        ];
    }

    /**
     * get the validation messages that apply to the request attributes
     * @return array
     */
    public function messages()
    {
        return [
            'title.unique' => 'Post title already exists',
            'title.required' => 'Post title is required',
            'description.required'  => 'Post Description is required',
        ];
    }
}
