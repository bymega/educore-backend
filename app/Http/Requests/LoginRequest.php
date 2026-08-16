<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => $this->filled('email')
                ? mb_strtolower(trim((string) $this->input('email')))
                : $this->input('email'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.string' => 'O campo de e-mail deve ser uma string.',
            'email.email' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.string' => 'O campo de senha deve ser uma string.',
        ];
    }

    /**
     * Get the body parameter descriptions and examples for the API documentation.
     */
    public function bodyParameters(): array
    {
        return [
            'email' => [
                'example' => 'admin@educore.com',
            ],
            'password' => [
                'example' => 'Ab123456#@',
            ],
        ];
    }
}
