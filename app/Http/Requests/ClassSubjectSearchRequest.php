<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassSubjectSearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['nullable', Rule::in(['active', 'inactive'])],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function queryParameters(): array
    {
        return [
            'status' => [
                'description' => 'Status da disciplina ofertada na turma.',
                'example' => 'active',
            ],
            'per_page' => [
                'description' => 'Quantidade de disciplinas por página, entre 1 e 100.',
                'example' => 10,
            ],
            'page' => [
                'description' => 'Número da página que será retornada.',
                'example' => 1,
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'status.in' => 'O status deve ser active ou inactive.',
            'per_page.integer' => 'A quantidade por página deve ser um número inteiro.',
            'per_page.min' => 'A quantidade por página deve ser pelo menos 1.',
            'per_page.max' => 'A quantidade por página não pode ser maior que 100.',
            'page.integer' => 'A página deve ser um número inteiro.',
            'page.min' => 'A página deve ser pelo menos 1.',
        ];
    }
}
