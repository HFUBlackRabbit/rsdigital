<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingInRequest extends FormRequest
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
            'credential' => ['required', 'string', function($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^\+7(\d){10}$/', $value)) {
                    $fail($attribute.' is invalid');
                }
            }],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
}
