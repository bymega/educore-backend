<?php

namespace App\Http\Requests;

use App\Models\SchoolClass;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SchoolClassRequest extends FormRequest
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
        $schoolClassId = null;

        if ($uuid = $this->route('uuid')) {
            $schoolClassId = SchoolClass::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $schoolClassId) {
                throw new NotFoundHttpException('Turma não encontrada.');
            }
        }

        return [
            'school_year_id' => [
                'required',
                'integer',
                Rule::exists('school_years', 'id')->whereNull('deleted_at'),
            ],
            'grade_level_id' => [
                'required',
                'integer',
                Rule::exists('grade_levels', 'id')->whereNull('deleted_at'),
            ],
            'name' => ['required', 'string', 'max:255'],
            'code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('school_classes', 'code')->ignore($schoolClassId),
            ],
            'shift' => [
                'required',
                'string',
                Rule::in(['morning', 'afternoon', 'evening', 'full_time']),
            ],
            'room' => ['nullable', 'string', 'max:255'],
            'capacity' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'status' => [
                'sometimes',
                'string',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => $this->filled('name')
                ? trim((string) $this->input('name'))
                : $this->input('name'),
            'code' => $this->filled('code')
                ? strtoupper(trim((string) $this->input('code')))
                : $this->input('code'),
            'room' => $this->filled('room')
                ? trim((string) $this->input('room'))
                : $this->input('room'),
        ]);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'school_year_id' => ['example' => 1],
            'grade_level_id' => ['example' => 1],
            'name' => ['example' => 'Turma A'],
            'code' => ['example' => 'TURMA-A'],
            'shift' => ['example' => 'morning'],
            'room' => ['example' => 'Sala 101'],
            'capacity' => ['example' => 30],
            'status' => ['example' => 'active'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'school_year_id.required' => 'Informe o ano letivo.',
            'school_year_id.integer' => 'O ano letivo deve ser identificado por um número inteiro.',
            'school_year_id.exists' => 'O ano letivo informado não existe ou está excluído.',

            'grade_level_id.required' => 'Informe a série escolar.',
            'grade_level_id.integer' => 'A série escolar deve ser identificada por um número inteiro.',
            'grade_level_id.exists' => 'A série escolar informada não existe ou está excluída.',

            'name.required' => 'Informe o nome da turma.',
            'name.string' => 'O nome da turma deve ser um texto.',
            'name.max' => 'O nome da turma deve ter no máximo 255 caracteres.',

            'code.required' => 'Informe o código da turma.',
            'code.string' => 'O código da turma deve ser um texto.',
            'code.max' => 'O código da turma deve ter no máximo 10 caracteres.',
            'code.unique' => 'Já existe uma turma com este código.',

            'shift.required' => 'Informe o turno da turma.',
            'shift.string' => 'O turno da turma deve ser um texto.',
            'shift.in' => 'O turno deve ser morning, afternoon, evening ou full_time.',

            'room.string' => 'A sala deve ser um texto.',
            'room.max' => 'A sala deve ter no máximo 255 caracteres.',

            'capacity.integer' => 'A capacidade deve ser um número inteiro.',
            'capacity.min' => 'A capacidade deve ser maior que zero.',
            'capacity.max' => 'A capacidade não pode ser maior que 65535.',

            'status.string' => 'O status deve ser um texto.',
            'status.in' => 'O status deve ser active ou inactive.',
        ];
    }
}
