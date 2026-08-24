<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubjectSearchRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:10'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1'],
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
    public function queryParameters(): array
    {
        return [
            'name' => [
                'description' => 'Nome da disciplina.',
                'example' => 'Matemática',
            ],
            'code' => [
                'description' => 'Código da disciplina.',
                'example' => 'MAT',
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
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'code.string' => 'O código deve ser um texto.',
            'code.max' => 'O código não pode ter mais de 10 caracteres.',
            'per_page.integer' => 'A quantidade por página deve ser um número inteiro.',
            'per_page.min' => 'A quantidade por página deve ser pelo menos 1.',
            'per_page.max' => 'A quantidade por página não pode ser maior que 100.',
            'page.integer' => 'A página deve ser um número inteiro.',
            'page.min' => 'A página deve ser pelo menos 1.',
        ];
    }
}
