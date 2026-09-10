<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttendanceSearchRequest extends FormRequest
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
        return [
            'class_lesson_id' => ['nullable', 'integer'],
            'enrollment_id' => ['nullable', 'integer'],
            'status' => [
                'nullable',
                Rule::in(['present', 'absent', 'late', 'excused']),
            ],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function queryParameters(): array
    {
        return [
            'class_lesson_id' => [
                'description' => 'Identificador da aula.',
                'example' => 1,
            ],
            'enrollment_id' => [
                'description' => 'Identificador da matrícula.',
                'example' => 1,
            ],
            'status' => [
                'description' => 'Status da frequência: present, absent, late ou excused.',
                'example' => 'present',
            ],
            'per_page' => [
                'description' => 'Quantidade de frequências por página, entre 1 e 100.',
                'example' => 10,
            ],
            'page' => [
                'description' => 'Número da página que será retornada.',
                'example' => 1,
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'class_lesson_id.integer' => 'A aula deve ser identificada por um número inteiro.',
            'enrollment_id.integer' => 'A matrícula deve ser identificada por um número inteiro.',
            'status.in' => 'O status deve ser present, absent, late ou excused.',

            'per_page.integer' => 'A quantidade por página deve ser um número inteiro.',
            'per_page.min' => 'A quantidade por página deve ser pelo menos 1.',
            'per_page.max' => 'A quantidade por página não pode ser maior que 100.',

            'page.integer' => 'A página deve ser um número inteiro.',
            'page.min' => 'A página deve ser pelo menos 1.',
        ];
    }
}
