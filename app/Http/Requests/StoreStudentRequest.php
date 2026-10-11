<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|regex:/^[0-9]{11}$/',
            'course' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Phone number must be exactly 11 digits.',
            'email.unique' => 'This email is already registered.',
        ];
    }
}