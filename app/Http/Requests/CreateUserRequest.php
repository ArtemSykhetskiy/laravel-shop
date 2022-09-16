<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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

    public function message()
    {
        return [
            'name:min' => 'User name should me longer than 2 characters',
            'surname:min' => 'User surname should me longer than 2 characters',
            'phone' => 'Incorrect phone format',
            'password' => 'Incorrect password'

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
            'name' => ['required', 'min:2', 'max:35'],
            'surname' => ['required', 'min:2', 'max:35'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'birthdate' => ['required', 'date', 'before_or_equal:-18 years'],
            'password' => ['required', 'confirmed'],
        ];
    }
}
