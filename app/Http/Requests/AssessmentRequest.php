<?php

namespace App\Http\Requests;

use App\Models\Assessment;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AssessmentRequest extends FormRequest
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
        $assessmentId = null;

        if ($uuid = $this->route('uuid')) {
            $assessmentId = Assessment::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (!$assessmentId) {
                throw new NotFoundHttpException('Avaliação não encontrada.');
            }
        }

        return [
            'class_subject_id' => [
                'required',
                'integer',
                Rule::exists('class_subjects', 'id')
                    ->whereNull('deleted_at')
            ],
            'term_id' => [
                'required',
                'integer',
                Rule::exists('terms', 'id')
                    ->whereNull('deleted_at')
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('assessments', 'name')
                    ->where('class_subject_id', $this->input('class_subject_id'))
                    ->where('term_id', $this->input('term_id'))
                    ->ignore($assessmentId)
            ],
            'assessment_date' => [
                'required',
                'date_format:Y-m-d'
            ],
            'maximum_score' => [
                'required',
                'numeric',
                'gt:0',
                'max:99.99',
            ],
            'weight' => [
                'required',
                'numeric',
                'gt:0',
                'max:99.99',
            ]
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
        ]);
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
            'term_id' => ['example' => 2],
            'name' => ['example' => 'Prova de Matemática'],
            'assessment_date' => ['example' => '2026-04-20'],
            'maximum_score' => ['example' => 10],
            'weight' => ['example' => 5]
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

            'term_id.required' => 'Informe o período.',
            'term_id.integer' => 'O período deve ser identificado por um número inteiro.',
            'term_id.exists' => 'O período informado não existe ou está excluído.',

            'name.required' => 'Informe o nome da avaliação.',
            'name.string' => 'A avaliação deve ser um texto.',
            'name.max' => 'A avaliação deve ser no máximo 255.',
            'name.unique' => 'Essa avaliação já está cadastrada para esta disciplina e período.',

            'assessment_date.required' => 'Informe a data de avaliação.',
            'assessment_date.date_format' => 'A data da avaliação deve estar no formato AAAA-MM-DD.',

            'maximum_score.required' => 'Informe a pontuação máxima.',
            'maximum_score.numeric' => 'A pontuação máxima deve ser um número.',
            'maximum_score.gt' => 'A pontuação máxima deve ser maior que zero.',
            'maximum_score.max' => 'A pontuação máxima não pode ser maior que 99,99.',

            'weight.required' => 'Informe o peso da nota.',
            'weight.numeric' => 'O peso da nota deve ser um número.',
            'weight.gt' => 'O peso da nota deve ser maior que zero.',
            'weight.max' => 'O peso da nota não pode ser maior que 99,99.'
        ];
    }
}
