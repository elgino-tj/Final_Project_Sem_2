<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'txtid' => 'required|unique:students,idstudents|min:7|max:7',
            'txtfullname' => 'required',
            'txtgender' => 'required',
            'txtemail' => 'required|email|unique:students,emailaddress',
            'txtphone' => 'required|numeric',
            'txtaddress' => 'required'
     
        ];
    }
    public function messages(): array
{
    return [
        'txtid.required' => 'The ID field must be at least 7 characters.',
        'txtid.unique' => 'This ID has been taken. Please choose another.',
        'txtfullname.required' => 'The Fullname field must be filled.',
        'txtgender.required' => 'The Gender field must be filled.',
        'txtemail.required' => 'The Email field must be filled.',
        'txtemail.unique' => 'This Email has been taken. Please choose another.',
        'txtphone.required' => 'The Phone field must be filled.',
        'txtaddress.required' => 'The Address field must be filled.',

         ];
}
}
