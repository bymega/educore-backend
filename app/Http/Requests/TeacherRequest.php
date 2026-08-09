<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $teacherId = null;

        if ($uuid = $this->route('uuid')) {
            $teacherId = Teacher::query()
                ->where('uuid', $uuid)
                ->value('id');
        }

        return [
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->whereNull('deleted_at'),
                Rule::unique('teachers', 'user_id')->ignore($teacherId),
            ],
            'registration_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('teachers', 'registration_number')->ignore($teacherId),
            ],
            'cpf' => [
                'required',
                'string',
                'regex:/^(?:\d{11}|\d{3}\.\d{3}\.\d{3}-\d{2})$/',
                Rule::unique('teachers', 'cpf')->ignore($teacherId),
            ],
            'specialization' => ['nullable', 'string', 'max:255'],
            'status' => ['sometimes', Rule::in(['active', 'inactive', 'blocked'])],
        ];
    }

    /**
     * Get the body parameter descriptions and examples for the API documentation.
     */
    public function bodyParameters(): array
    {
        return [
            'user_id' => [
                'example' => 1,
            ],
            'registration_number' => [
                'example' => 'TCH101',
            ],
            'cpf' => [
                'example' => '52289012345',
            ],
            'specialization' => [
                'example' => 'Graduado em Matemática',
            ],
            'status' => [
                'example' => 'active',
            ],
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.unique' => 'Este usuário já possui um cadastro de professor.',
            'registration_number.unique' => 'Esta matrícula já está cadastrada.',
            'cpf.regex' => 'O CPF deve conter 11 dígitos ou estar no formato 000.000.000-00.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ];
    }
}
