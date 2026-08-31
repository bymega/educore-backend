<?php

namespace App\Http\Requests;

use App\Models\SchoolClass;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassSubjectRequest extends FormRequest
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
        $schoolClassId = SchoolClass::query()
            ->where('uuid', $this->route('classUuid'))
            ->value('id');

        return [
            'subjects' => [
                'required',
                'array',
                'min:1',
            ],

            'subjects.*.subject_id' => [
                'required',
                'integer',
                'distinct',
                Rule::exists('subjects', 'id')
                    ->whereNull('deleted_at'),
                Rule::unique('class_subjects', 'subject_id')
                    ->where('school_class_id', $schoolClassId),
            ],

            'subjects.*.weekly_classes' => [
                'nullable',
                'integer',
                'min:1',
                'max:255',
            ],

            'subjects.*.status' => [
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
            'subjects' => [
                'description' => 'Lista de disciplinas que serão atribuídas à turma.',
                'example' => [
                    [
                        'subject_id' => 16,
                        'weekly_classes' => 5,
                        'status' => 'active',
                    ],
                    [
                        'subject_id' => 17,
                        'weekly_classes' => 2,
                        'status' => 'active',
                    ],
                ],
            ],
        ];
    }
    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'subjects.required' =>
            'Informe pelo menos uma disciplina.',
            'subjects.array' =>
            'As disciplinas devem ser enviadas em uma lista.',
            'subjects.min' =>
            'Informe pelo menos uma disciplina.',

            'subjects.*.subject_id.required' =>
            'Informe a disciplina.',
            'subjects.*.subject_id.integer' =>
            'A disciplina deve ser identificada por um número inteiro.',
            'subjects.*.subject_id.distinct' =>
            'A mesma disciplina não pode ser informada mais de uma vez.',
            'subjects.*.subject_id.exists' =>
            'Uma das disciplinas informadas não existe ou está excluída.',
            'subjects.*.subject_id.unique' =>
            'Uma das disciplinas informadas já está atribuída a esta turma.',

            'subjects.*.weekly_classes.integer' =>
            'A quantidade de aulas semanais deve ser um número inteiro.',
            'subjects.*.weekly_classes.min' =>
            'A quantidade de aulas semanais deve ser maior que zero.',
            'subjects.*.weekly_classes.max' =>
            'A quantidade de aulas semanais não pode ser maior que 255.',

            'subjects.*.status.string' =>
            'O status deve ser um texto.',
            'subjects.*.status.in' =>
            'O status deve ser active ou inactive.',
        ];
    }
}
