<?php

namespace App\Http\Requests;

use App\Models\Enrollment;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EnrollmentRequest extends FormRequest
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
        $enrollmentId = null;

        if ($uuid = $this->route('uuid')) {
            $enrollmentId = Enrollment::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $enrollmentId) {
                throw new NotFoundHttpException('Matrícula não encontrada.');
            }
        }

        return [
            'student_id' => [
                'required',
                'integer',
                Rule::exists('students', 'id')->whereNull('deleted_at'),
                Rule::unique('enrollments', 'student_id')
                    ->where('school_class_id', $this->input('school_class_id'))
                    ->ignore($enrollmentId),
            ],
            'school_class_id' => [
                'required',
                'integer',
                Rule::exists('school_classes', 'id')->whereNull('deleted_at')
            ],
            'enrollment_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'status' => [
                'sometimes',
                Rule::in(['active', 'cancelled', 'transferred', 'completed'])
            ],
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
            'student_id' => ['example' => 1],
            'school_class_id' => ['example' => 2],
            'enrollment_date' => ['example' => '2026-01-19'],
            'status' => ['example' => 'active'],
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
            'student_id.required' => 'Informe o estudante.',
            'student_id.integer' => 'O estudante deve ser identificado por um número inteiro.',
            'student_id.exists' => 'O estudante informado não existe ou está excluído.',
            'student_id.unique' => 'Este estudante já está matriculado nesta turma.',

            'school_class_id.required' => 'Informe a turma.',
            'school_class_id.integer' => 'a turma deve ser identificado por um número inteiro.',
            'school_class_id.exists' => 'A turma informada não existe ou está excluído.',

            'enrollment_date.required' => 'Informe a data de matrícula.',
            'enrollment_date.date_format' => 'A data de matrícula deve estar no formato AAAA-MM-DD.',

            'status.in' => 'O status deve ser active, cancelled, transferred ou completed',
        ];
    }
}
