<?php

namespace App\Http\Requests;

use App\Models\ClassSubject;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassSubjectTeacherRequest extends FormRequest
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
        $classSubjectId = ClassSubject::query()
            ->where('uuid', $this->route('classSubjectUuid'))
            ->value('id');

        $rules = [
            'teachers' => [
                'required',
                'array',
                'min:1',
            ],

            'teachers.*.teacher_id' => [
                'required',
                'integer',
                'distinct',
                Rule::exists('teachers', 'id')
                    ->whereNull('deleted_at'),
            ],

            'teachers.*.start_date' => [
                'required',
                'date_format:Y-m-d',
            ],

            'teachers.*.end_date' => [
                'nullable',
                'date_format:Y-m-d',
                'after_or_equal:teachers.*.start_date',
            ],
        ];

        foreach ($this->input('teachers', []) as $index => $teacher) {
            $rules["teachers.{$index}.teacher_id"][] = Rule::unique(
                'class_subject_teachers',
                'teacher_id'
            )->where(fn($query) => $query
                ->where('class_subject_id', $classSubjectId)
                ->whereDate('start_date', $teacher['start_date'] ?? null));
        }

        return $rules;
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'teachers' => [
                'description' => 'Lista de professores que serão atribuídas à disciplina',
                'example' => [
                    [
                        'teacher_id' => 1,
                        'start_date' => '2027-02-13',
                        'end_date' => '2027-12-15',
                    ],
                ],
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'teachers.required' =>
            'Informe pelo menos um professor.',
            'teachers.array' =>
            'Os professores devem ser enviados em uma lista.',
            'teachers.min' =>
            'Informe pelo menos um professor.',

            'teachers.*.teacher_id.required' =>
            'Informe o professor.',
            'teachers.*.teacher_id.integer' =>
            'O professor deve ser identificado por um número inteiro.',
            'teachers.*.teacher_id.distinct' =>
            'O mesmo professor não pode ser informado mais de uma vez.',
            'teachers.*.teacher_id.exists' =>
            'Um dos professores informados não existe ou está excluído.',
            'teachers.*.teacher_id.unique' =>
            'Um dos professores informados já está atribuído a esta disciplina nesta data.',

            'teachers.*.start_date.required' =>
            'Informe a data de início.',
            'teachers.*.start_date.date_format' =>
            'A data de início deve estar no formato AAAA-MM-DD.',

            'teachers.*.end_date.date_format' =>
            'A data de término deve estar no formato AAAA-MM-DD.',
            'teachers.*.end_date.after_or_equal' =>
            'A data de término deve ser igual ou posterior à data de início.',
        ];
    }
}
