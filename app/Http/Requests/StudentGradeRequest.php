<?php

namespace App\Http\Requests;

use App\Models\Assessment;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentGradeRequest extends FormRequest
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
        $studentGradeId = null;

        if ($uuid = $this->route('uuid')) {
            $studentGradeId = StudentGrade::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $studentGradeId) {
                throw new NotFoundHttpException('Nota não encontrada.');
            }
        }

        return [
            'assessment_id' => [
                'required',
                'integer',
                Rule::exists('assessments', 'id')
                    ->whereNull('deleted_at'),
            ],

            'enrollment_id' => [
                'required',
                'integer',
                Rule::exists('enrollments', 'id')
                    ->whereNull('deleted_at'),

                Rule::unique('student_grades', 'enrollment_id')
                    ->where(
                        'assessment_id',
                        $this->input('assessment_id')
                    )
                    ->ignore($studentGradeId),
            ],

            'score' => [
                'required',
                'numeric',
                'min:0',
                'max:99.99',
            ],

            'observation' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator): void {
                if ($validator->errors()->hasAny([
                    'assessment_id',
                    'enrollment_id',
                    'score',
                ])) {
                    return;
                }

                $assessment = Assessment::query()
                    ->with('classSubject:id,school_class_id')
                    ->find($this->integer('assessment_id'));

                $enrollment = Enrollment::query()
                    ->find($this->integer('enrollment_id'));

                if (! $assessment || ! $enrollment) {
                    return;
                }

                if (
                    ! $assessment->classSubject
                    || $enrollment->school_class_id
                    !== $assessment->classSubject->school_class_id
                ) {
                    $validator->errors()->add(
                        'enrollment_id',
                        'A matrícula não pertence à turma desta avaliação.'
                    );
                }

                if ($enrollment->status !== 'active') {
                    $validator->errors()->add(
                        'enrollment_id',
                        'Não é possível lançar nota para uma matrícula inativa.'
                    );
                }

                if (
                    (float) $this->input('score')
                    > (float) $assessment->maximum_score
                ) {
                    $validator->errors()->add(
                        'score',
                        "A nota não pode ser maior que {$assessment->maximum_score}."
                    );
                }
            },
        ];
    }

    public function messages(): array
    {
        return [
            'assessment_id.required' => 'Informe a avaliação.',
            'assessment_id.integer' => 'A avaliação deve ser identificada por um número inteiro.',
            'assessment_id.exists' => 'A avaliação informada não existe ou está excluída.',

            'enrollment_id.required' => 'Informe a matrícula.',
            'enrollment_id.integer' => 'A matrícula deve ser identificada por um número inteiro.',
            'enrollment_id.exists' => 'A matrícula informada não existe ou está excluída.',
            'enrollment_id.unique' => 'Esta matrícula já possui uma nota para esta avaliação.',

            'score.required' => 'Informe a nota.',
            'score.numeric' => 'A nota deve ser um número.',
            'score.min' => 'A nota não pode ser negativa.',
            'score.max' => 'A nota não pode ser maior que 99,99.',

            'observation.string' => 'A observação deve ser um texto.',
            'observation.max' => 'A observação deve possuir no máximo 255 caracteres.',
        ];
    }
}
