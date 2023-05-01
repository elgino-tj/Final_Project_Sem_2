<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'txtfullname' => 'required',
            'txtgender' => 'required',
            'txtemail' => [
                'required',
                Rule::unique('students','emailaddress')->ignore($this->txtid,'idstudents'),
                'email'
            ],
            'txtphone' => 'required|numeric',
            'txtaddress' => 'required'
     
        ];
    }
    public function messages(): array
{
    return [
        'txtfullname.required' => 'The Fullname field must be filled.',
        'txtgender.required' => 'The Gender field must be filled.',
        'txtemail.required' => 'The Email field must be filled.',
        'txtemail.unique' => 'This Email has been taken. Please choose another.',
        'txtphone.required' => 'The Phone field must be filled.',
        'txtaddress.required' => 'The Address field must be filled.',

         ];
}
}
