<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ClassLessonSearchRequest extends FormRequest
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
            'class_subject' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:255'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'class_subject' => $this->filled('class_subject')
                ? trim((string) $this->input('class_subject'))
                : $this->input('class_subject'),
            'content' => $this->filled('content')
                ? trim((string) $this->input('content'))
                : $this->input('content'),
        ]);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function queryParameters(): array
    {
        return [
            'class_subject' => [
                'description' => 'Nome ou parte do nome da disciplina.',
                'example' => 'Matemática',
            ],
            'content' => [
                'description' => 'Conteúdo ou parte do conteúdo da aula.',
                'example' => 'Frações',
            ],
            'per_page' => [
                'description' => 'Quantidade de aulas por página, entre 1 e 100.',
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
            'class_subject.string' => 'O nome da disciplina deve ser um texto.',
            'class_subject.max' => 'O nome da disciplina não pode ter mais de 255 caracteres.',

            'content.string' => 'O conteúdo da aula deve ser um texto.',
            'content.max' => 'O conteúdo da aula não pode ter mais de 255 caracteres.',

            'per_page.integer' => 'A quantidade por página deve ser um número inteiro.',
            'per_page.min' => 'A quantidade por página deve ser pelo menos 1.',
            'per_page.max' => 'A quantidade por página não pode ser maior que 100.',

            'page.integer' => 'A página deve ser um número inteiro.',
            'page.min' => 'A página deve ser pelo menos 1.',
        ];
    }
}
