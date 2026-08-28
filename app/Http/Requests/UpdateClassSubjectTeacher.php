<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassSubjectTeacher extends FormRequest
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
            'teacher_id' => [
                'required',
                'integer',
                Rule::exists('teachers', 'id')
                    ->whereNull('deleted_at'),
            ],

            'start_date' => [
                'required',
                'date_format:Y-m-d',
            ],

            'end_date' => [
                'required',
                'date_format:Y-m-d',
            ],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'teacher_id' => [
                'description' => 'Identificador da professor.',
                'example' => 21,
            ],
            'start_date' => [
                'description' => 'Data inicial.',
                'example' => '2027-02-10',
            ],
            'end_date' => [
                'description' => 'Data final',
                'example' => '2027-12-08',
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'teacher_id.required' => 'Informe o professor.',
            'teacher_id.integer' => 'O professor deve ser identificado por um número inteiro.',
            'teacher_id.exists' => 'O professor informado não existe ou está excluído.',

            'start_date.require' => 'Informe a data de início.',
            'start_date.date_format' => 'A data de início deve estar no formato AAAA-MM-DD.',

            'end_date.date_format' => 'A data de término deve estar no formato AAAA-MM-DD.',
            'end_date.after_or_equal' => 'A data de término deve ser igual ou posterior à data de início.',
        ];
    }
}
