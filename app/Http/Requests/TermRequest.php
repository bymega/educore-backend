<?php

namespace App\Http\Requests;

use App\Models\Term;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TermRequest extends FormRequest
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
        $termId = null;

        if ($uuid = $this->route('uuid')) {
            $termId = Term::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $termId) {
                throw new NotFoundHttpException('Período letivo não encontrado.');
            }
        }

        return [
            'school_year_id' => [
                'required',
                'integer',
                Rule::exists('school_years', 'id')->whereNull('deleted_at'),
            ],
            'name' => ['required', 'string', 'max:255'],
            'number' => [
                'required',
                'integer',
                'min:1',
                'max:255',
                Rule::unique('terms', 'number')
                    ->where(fn($query) => $query->where('school_year_id', $this->input('school_year_id')))
                    ->ignore($termId),
            ],
            'start_date' => ['required', 'date_format:Y-m-d', 'before:end_date'],
            'end_date' => ['required', 'date_format:Y-m-d', 'after:start_date'],
            'status' => ['sometimes', Rule::in(['planned', 'active', 'completed', 'cancelled'])],
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
            'school_year_id' => ['example' => 1],
            'name' => ['example' => '1º Bimestre'],
            'number' => ['example' => 1],
            'start_date' => ['example' => '2026-02-02'],
            'end_date' => ['example' => '2026-04-17'],
            'status' => ['example' => 'planned'],
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
            'school_year_id.required' => 'Informe o ano letivo.',
            'school_year_id.integer' => 'O ano letivo deve ser identificado por um número inteiro.',
            'school_year_id.exists' => 'O ano letivo informado não existe ou está excluído.',

            'name.required' => 'Informe o nome do período letivo.',
            'name.string' => 'O nome do período letivo deve ser um texto.',
            'name.max' => 'O nome do período letivo deve ter no máximo 255 caracteres.',

            'number.required' => 'Informe o número do período letivo.',
            'number.integer' => 'O número do período letivo deve ser um número inteiro.',
            'number.min' => 'O número do período letivo deve ser maior que zero.',
            'number.max' => 'O número do período letivo deve ser no máximo 255.',
            'number.unique' => 'Já existe um período com este número no ano letivo informado.',

            'start_date.required' => 'Informe a data de início do período letivo.',
            'start_date.date_format' => 'A data de início deve estar no formato AAAA-MM-DD.',
            'start_date.before' => 'A data de início deve ser anterior à data de término.',

            'end_date.required' => 'Informe a data de término do período letivo.',
            'end_date.date_format' => 'A data de término deve estar no formato AAAA-MM-DD.',
            'end_date.after' => 'A data de término deve ser posterior à data de início.',

            'status.in' => 'O status deve ser planned, active, completed ou cancelled.',
        ];
    }
}
