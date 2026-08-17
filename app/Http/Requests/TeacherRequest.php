<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use App\Rules\UserHasRole;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TeacherRequest extends FormRequest
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
        $teacherId = null;

        if ($uuid = $this->route('uuid')) {
            $teacherId = Teacher::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $teacherId) {
                throw new NotFoundHttpException('Professor não encontrado.');
            }
        }

        return [
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->whereNull('deleted_at'),
                new UserHasRole('professor'),
                Rule::unique('teachers', 'user_id')->ignore($teacherId),
            ],
            'registration_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('teachers', 'registration_number')->ignore($teacherId),
            ],
            'cpf' => [
                'required',
                'string',
                'digits:11',
                Rule::unique('teachers', 'cpf')->ignore($teacherId),
            ],
            'specialization' => ['nullable', 'string', 'max:255'],
            'status' => ['sometimes', Rule::in(['active', 'inactive', 'blocked'])],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpf' => $this->filled('cpf')
                ? preg_replace('/\D/', '', (string) $this->input('cpf'))
                : $this->input('cpf'),
        ]);
    }

    /**
     * Get the body parameter descriptions and examples for the API documentation.
     */
    public function bodyParameters(): array
    {
        return [
            'user_id' => [
                'example' => 1,
            ],
            'registration_number' => [
                'example' => 'TCH101',
            ],
            'cpf' => [
                'example' => '52289012345',
            ],
            'specialization' => [
                'example' => 'Graduado em Matemática',
            ],
            'status' => [
                'example' => 'active',
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
            'user_id.unique' => 'Este usuário já possui um cadastro de professor.',
            'registration_number.unique' => 'Esta matrícula já está cadastrada.',
            'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ];
    }
}
