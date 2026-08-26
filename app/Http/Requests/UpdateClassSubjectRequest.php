<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject_id' => [
                'required',
                'integer',
                Rule::exists('subjects', 'id')
                    ->whereNull('deleted_at'),
            ],

            'weekly_classes' => [
                'nullable',
                'integer',
                'min:1',
                'max:255',
            ],

            'status' => [
                'sometimes',
                'string',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'subject_id' => [
                'description' => 'Identificador da disciplina.',
                'example' => 21,
            ],
            'weekly_classes' => [
                'description' => 'Quantidade de aulas semanais.',
                'example' => 2,
            ],
            'status' => [
                'description' => 'Status da disciplina na turma.',
                'example' => 'active',
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'subject_id.required' => 'Informe a disciplina.',
            'subject_id.integer' => 'A disciplina deve ser identificada por um número inteiro.',
            'subject_id.exists' => 'A disciplina informada não existe ou está excluída.',

            'weekly_classes.integer' => 'A quantidade de aulas semanais deve ser um número inteiro.',
            'weekly_classes.min' => 'A quantidade de aulas semanais deve ser maior que zero.',
            'weekly_classes.max' => 'A quantidade de aulas semanais não pode ser maior que 255.',

            'status.string' => 'O status deve ser um texto.',
            'status.in' => 'O status deve ser active ou inactive.',
        ];
    }
}
