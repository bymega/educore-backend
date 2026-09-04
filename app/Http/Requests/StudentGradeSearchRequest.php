<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentGradeSearchRequest extends FormRequest
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
            'enrollment_id' => ['nullable', 'string'],
            'assessment_id' => ['nullable', 'string'],
            'per_page' => ['nullable', 'integer'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'enrollment_id.string' => 'A matrícula deve ser informada como texto.',
            'assessment_id.string' => 'A avaliação deve ser informada como texto.',
            'per_page.integer' => 'A quantidade por página deve ser um número inteiro.',
        ];
    }
}
