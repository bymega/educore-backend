<?php

namespace App\Http\Requests;

use App\Models\Teacher;
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
        $teacher = null;
        if ($uuid = $this->route('uuid')) {
            $teacher = Teacher::query()->where('uuid', $uuid)->first();

            if (! $teacher) {
                throw new NotFoundHttpException('Professor não encontrado.');
            }
        }

        $teacherId = $teacher?->id;
        $updating = $teacher !== null;

        return [
            'name' => [$updating ? 'sometimes' : 'required', 'required', 'string', 'max:255'],
            'email' => [$updating ? 'sometimes' : 'required', 'required', 'string', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($teacher?->user_id)],
            'password' => [$updating ? 'sometimes' : 'required', 'nullable', 'string', 'min:8'],
            'registration_number' => [
                $updating ? 'sometimes' : 'required',
                'string',
                'max:255',
                Rule::unique('teachers', 'registration_number')->ignore($teacherId),
            ],
            'cpf' => [
                $updating ? 'sometimes' : 'required',
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
            'email' => $this->filled('email')
                ? mb_strtolower(trim((string) $this->input('email')))
                : $this->input('email'),
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
            'name' => ['example' => 'Maria Silva'],
            'email' => ['example' => 'maria@example.com'],
            'password' => ['example' => 'Senha@123'],
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
            'email.unique' => 'Este e-mail já está cadastrado.',
            'password.min' => 'A senha deve conter pelo menos 8 caracteres.',
            'registration_number.unique' => 'Esta matrícula já está cadastrada.',
            'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ];
    }
}
