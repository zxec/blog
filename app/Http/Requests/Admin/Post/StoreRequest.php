<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'image',
            'main_image' => 'image',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field is required',
            'title.string' => 'Data must be string type',
            'content.required' => 'This field is required',
            'content.string' => 'Data must be string type',
            'preview_image.image' => 'Need to choose an image',
            'preview_main.image' => 'Need to choose an image',
            'category_id.required' => 'This field is required',
            'category_id.integer' => 'Category ID must be a number',
            'category_id.exists' => 'Category ID must be in the database',
            'tag_ids.*.array' => 'Need to send an array of data',
        ];
    }
}
