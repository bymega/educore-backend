<?php

namespace App\Http\Requests;

use App\Models\Attendance;
use App\Models\ClassLesson;
use App\Models\Enrollment;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AttendanceRequest extends FormRequest
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
        $attendanceId = null;

        if ($uuid = $this->route('uuid')) {
            $attendanceId = Attendance::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $attendanceId) {
                throw new NotFoundHttpException('Frequência não encontrada.');
            }
        }

        return [
            'class_lesson_id' => [
                'required',
                'integer',
                Rule::exists('class_lessons', 'id')
                    ->whereNull('deleted_at'),
            ],

            'enrollment_id' => [
                'required',
                'integer',
                Rule::exists('enrollments', 'id')
                    ->whereNull('deleted_at'),
                Rule::unique('attendances', 'enrollment_id')
                    ->where('class_lesson_id', $this->input('class_lesson_id'))
                    ->ignore($attendanceId),
            ],

            'status' => [
                'required',
                Rule::in(['present', 'absent', 'late', 'excused']),
            ],
        ];
    }

    /**
     * Get the after validation callables for the request.
     *
     * @return array<callable>
     */
    public function after(): array
    {
        return [
            function (Validator $validator): void {
                if ($validator->errors()->hasAny([
                    'class_lesson_id',
                    'enrollment_id',
                ])) {
                    return;
                }

                $classLesson = ClassLesson::query()
                    ->with('classSubject:id,school_class_id')
                    ->find($this->integer('class_lesson_id'));

                $enrollment = Enrollment::query()
                    ->find($this->integer('enrollment_id'));

                if (! $classLesson || ! $enrollment) {
                    return;
                }

                if (
                    ! $classLesson->classSubject
                    || $enrollment->school_class_id
                    !== $classLesson->classSubject->school_class_id
                ) {
                    $validator->errors()->add(
                        'enrollment_id',
                        'A matrícula não pertence à turma desta aula.'
                    );
                }

                if ($enrollment->status !== 'active') {
                    $validator->errors()->add(
                        'enrollment_id',
                        'Não é possível registrar frequência para uma matrícula inativa.'
                    );
                }
            },
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
            'class_lesson_id' => ['example' => 1],
            'enrollment_id' => ['example' => 1],
            'status' => ['example' => 'present'],
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
            'class_lesson_id.required' => 'Informe a aula.',
            'class_lesson_id.integer' => 'A aula deve ser identificada por um número inteiro.',
            'class_lesson_id.exists' => 'A aula informada não existe ou está excluída.',

            'enrollment_id.required' => 'Informe a matrícula.',
            'enrollment_id.integer' => 'A matrícula deve ser identificada por um número inteiro.',
            'enrollment_id.exists' => 'A matrícula informada não existe ou está excluída.',
            'enrollment_id.unique' => 'Esta matrícula já possui frequência registrada para esta aula.',

            'status.required' => 'Informe o status da frequência.',
            'status.in' => 'O status deve ser present, absent, late ou excused.',
        ];
    }
}
