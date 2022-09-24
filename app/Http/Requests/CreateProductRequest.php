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
        return auth()->check() && isAdmin(auth()->user());
    }

    public function message()
    {
        return [
            'title:min' => 'Title should me longer than 3 characters',
            'title:max' => 'Title should me shorter than 255 characters',
            'description:min' => 'Description should me longer than 3 characters',
            'short_description:min' => 'Short description should me longer than 3 characters',
            'short_description:max' => 'Short description should me shorter than 150 characters',
            'SKU:max' => 'SKU should me shorter than 30 characters',
            'SKU:min' => 'SKU should me longer than 3 characters',
            'discount:min' => 'Discount cannot be lower than 0',
            'discount:max' => 'Discount cannot be higher than 0',
            'in_stock:min' => 'In stock cannot be lower than 0',


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
            'title' => ['required', 'string' ,'min:3', 'max:255', 'unique:products'],
            'description' => ['required', 'string', 'min:20'],
            'short_description' => ['required', 'string', 'min:20', 'max:150'],
            'SKU' => ['required', 'string', 'min:2', 'max:35', 'unique:products'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric', 'min:0', 'max:99'],
            'in_stock' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'numeric'],
            'thumbnail' => ['required', 'image:png,jpg,jpeg'],
            'image.*' => ['image:png,jpg,jpeg']

        ];
    }
}
