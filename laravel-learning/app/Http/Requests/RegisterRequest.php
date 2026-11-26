<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine whether the user is authorized
     * to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'firstname' => [
                'required',
                'string',
                'max:50',
            ],

            'lastname' => [
                'required',
                'string',
                'max:50',
            ],

            'username' => [
                'required',
                'string',
                'alpha_dash',
                'max:30',
                'unique:users,username',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
                'confirmed',
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'firstname.required' => 'First name is required.',
            'firstname.max' => 'First name cannot exceed 50 characters.',

            'lastname.required' => 'Last name is required.',
            'lastname.max' => 'Last name cannot exceed 50 characters.',

            'username.required' => 'Username is required.',
            'username.alpha_dash' => 'Username may only contain letters, numbers, hyphens and underscores.',
            'username.unique' => 'This username is already taken.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',

            'password.required' => 'Password is required.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
