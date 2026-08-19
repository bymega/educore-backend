<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolYearRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date_format:Y-m-d', 'before:end_date'],
            'end_date' => ['required', 'date_format:Y-m-d', 'after:start_date'],
            'status' => ['sometimes', Rule::in(['planned', 'active', 'completed', 'cancelled'])],
        ];
    }

    /**
     * Get the body parameter descriptions and examples for the API documentation.
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'example' => '2026',
            ],
            'start_date' => [
                'example' => '2026-02-02',
            ],
            'end_date' => [
                'example' => '2026-12-18',
            ],
            'status' => [
                'example' => 'planned',
            ],
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
            'name.required' => 'Informe o ano letivo.',
            'name.string' => 'O ano letivo deve ser um texto.',
            'name.max' => 'O ano letivo deve ter no máximo 255 caracteres.',

            'start_date.required' => 'Informe a data de início do ano letivo.',
            'start_date.date_format' => 'A data de início deve estar no formato AAAA-MM-DD.',
            'start_date.before' => 'A data de início deve ser anterior à data de término.',

            'end_date.required' => 'Informe a data de término do ano letivo.',
            'end_date.date_format' => 'A data de término deve estar no formato AAAA-MM-DD.',
            'end_date.after' => 'A data de término deve ser posterior à data de início.',

            'status.in' => 'O status deve ser planned, active, completed, cancelled.',
        ];
    }
}
