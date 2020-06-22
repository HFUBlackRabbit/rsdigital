<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingUpRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^\+7(\d){10}$/', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'regex:/[a-z]+/', 'regex:/[A-Z]+/', 'regex:/[$%&!:.]+/', 'min:6', 'confirmed']
        ];
    }
}
