<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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

   public function messages()
   {
       return [
           'password:min' => 'Password is too short',
       ];
   }

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['min:4', 'required', 'string' ],
        ];
    }
}
