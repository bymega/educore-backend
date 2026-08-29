<?php

namespace App\Http\Requests;

use App\Models\Subject;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubjectRequest extends FormRequest
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

        $subjectId = null;

        if ($uuid = $this->route('uuid')) {
            $subjectId = Subject::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $subjectId) {
                throw new NotFoundHttpException('Disciplina não encontrada.');
            }
        }
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subjects', 'name')->ignore($subjectId),
            ],

            'code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('subjects', 'code')->ignore($subjectId),
            ],

            'workload' => [
                'nullable',
                'integer',
                'min:1',
                'max:65535',
            ],

            'status' => [
                'sometimes',
                'string',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => $this->filled('name')
                ? trim((string) $this->input('name'))
                : $this->input('name'),

            'code' => $this->filled('code')
                ? strtoupper(trim((string) $this->input('code')))
                : $this->input('code'),
        ]);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'name' => ['example' => 'Matemática'],
            'code' => ['example' => 'MAT'],
            'workload' => ['example' => 80],
            'status' => ['example' => 'active'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Informe o nome da disciplina.',
            'name.string' => 'O nome da disciplina deve ser um texto.',
            'name.max' => 'O nome da disciplina deve ter no máximo 255 caracteres.',
            'name.unique' => 'Já existe uma disciplina com este nome.',

            'code.required' => 'Informe o código da disciplina.',
            'code.string' => 'O código da disciplina deve ser um texto.',
            'code.max' => 'O código da disciplina deve ter no máximo 10 caracteres.',
            'code.unique' => 'Já existe uma disciplina com este código.',

            'workload.integer' => 'A carga horária deve ser um número inteiro.',
            'workload.min' => 'A carga horária deve ser maior que zero.',
            'workload.max' => 'A carga horária não pode ser maior que 65535.',

            'status.in' => 'O status deve ser active ou inactive.',
        ];
    }
}
