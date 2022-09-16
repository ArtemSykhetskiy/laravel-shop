<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return isAdmin(auth()->user());
    }

    public function messages()
    {
        return [
            'name:min' => 'Name must be longer than 3 characters' ,
            'name:max' => 'Name must be shorter than 50 characters',
            'description:min' => 'Description must be longer than 3 characters',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required' , 'string', 'min:3', 'max:50', 'unique:categories'],
            'description' => ['min:3', 'string', 'nullable']
        ];
    }
}
