<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EnrollmentSearchRequest extends FormRequest
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
            'student_name' => ['nullable', 'string', 'max:255'],
            'school_class_name' => ['nullable', 'string', 'max:255'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'student_name' => $this->filled('student_name')
                ? trim((string) $this->input('student_name'))
                : $this->input('student_name'),
            'school_class_name' => $this->filled('school_class_name')
                ? trim((string) $this->input('school_class_name'))
                : $this->input('school_class_name'),
        ]);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function queryParameters(): array
    {
        return [
            'student_name' => [
                'description' => 'Nome ou parte do nome do estudante.',
                'example' => 'Maria',
            ],
            'school_class_name' => [
                'description' => 'Nome ou parte do nome da turma.',
                'example' => '1º Ano A',
            ],
            'per_page' => [
                'description' => 'Quantidade de matrículas por página, entre 1 e 100.',
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
            'student_name.string' => 'O nome do estudante deve ser um texto.',
            'student_name.max' => 'O nome do estudante não pode ter mais de 255 caracteres.',

            'school_class_name.string' => 'O nome da turma deve ser um texto.',
            'school_class_name.max' => 'O nome da turma não pode ter mais de 255 caracteres.',

            'per_page.integer' => 'A quantidade por página deve ser um número inteiro.',
            'per_page.min' => 'A quantidade por página deve ser pelo menos 1.',
            'per_page.max' => 'A quantidade por página não pode ser maior que 100.',
            'page.integer' => 'A página deve ser um número inteiro.',
            'page.min' => 'A página deve ser pelo menos 1.',
        ];
    }
}
