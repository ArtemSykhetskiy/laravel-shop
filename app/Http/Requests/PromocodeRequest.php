<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromocodeRequest extends FormRequest
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
            'expiration' => ['date'],
            'discount' => ['required', 'min:0', 'max:100'],
            'count' => ['required', 'int'],
            'usages' => ['required', 'int'],
            'user_id' => ['int']
        ];
    }
}
