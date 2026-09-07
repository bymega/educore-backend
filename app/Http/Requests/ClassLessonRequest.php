<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.s
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'class_subject_id' => [
                'required',
                'integer',
                Rule::exists('class_subjects', 'id')
                    ->whereNull('deleted_at')
            ],

            'lesson_date' => [
                'required',
                'date_format:Y-m-d'
            ],

            'content' => [
                'required',
                'string',
                'max:255',
            ]
        ];
    }

    /**
     * Get the body parameter descriptions and examples for the API documentation.
     *
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'class_subject_id' => ['example' => 1],
            'lesson_date' => ['example' => '2026-04-20'],
            'content' => ['example' => 'Ortografia'],
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
            'class_subject_id.required' => 'Informe uma disciplina ofertada.',
            'class_subject_id.integer' => 'A disciplina ofertada deve ser identificada por um número inteiro.',
            'class_subject_id.exists' => 'A disciplina ofertada informada não existe ou está excluída.',


            'lesson_date.required' => 'Informe a data da aula.',
            'lesson_date.date_format' => 'A data da aula deve estar no formato AAAA-MM-DD.',

            'content.required' => 'Informe o conteúdo',
            'content.string' => 'O conteúdo deve ser um texto.',
            'content.max' => 'O conteúdo deve ser no máximo 255.',
        ];
    }
}
