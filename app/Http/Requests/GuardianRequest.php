<?php

namespace App\Http\Requests;

use App\Models\Guardian;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GuardianRequest extends FormRequest
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
        if ($uuid = $this->route('uuid')) {
            $guardianExists = Guardian::query()
                ->where('uuid', $uuid)
                ->exists();

            if (! $guardianExists) {
                throw new NotFoundHttpException('Responsável não encontrado.');
            }
        }

        return [
            'name' => ['required', 'string', 'max:255'],

            'cpf' => [
                'required',
                'string',
                'digits:11',
                Rule::unique('guardians', 'cpf')->ignore($this->route('uuid'), 'uuid'),
            ],

            'phone' => ['nullable', 'string', 'max:20'],

            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('guardians', 'email')
                    ->ignore($this->route('uuid'), 'uuid'),
            ],

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
            'email' => $this->filled('email')
                ? mb_strtolower(trim((string) $this->input('email')))
                : $this->input('email'),
        ]);
    }

    /**
     * Get the body parameter descriptions and examples for the API documentation.
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'example' => 'Ricardo',
            ],
            'cpf' => [
                'example' => '52289012345',
            ],
            'phone' => [
                'example' => '71999999999',
            ],
            'email' => [
                'example' => 'ricardo@gmail.com',
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
            'name.required' => 'Informe o nome do responsável.',
            'name.string' => 'O nome do responsável deve ser um texto.',
            'name.max' => 'O nome do responsável deve ter no máximo 255 caracteres.',

            'cpf.required' => 'Informe o CPF do responsável.',
            'cpf.string' => 'O CPF do responsável deve ser um texto.',
            'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos.',
            'cpf.unique' => 'Este CPF já está cadastrado.',

            'phone.string' => 'O telefone do responsável deve ser um texto.',
            'phone.max' => 'O telefone do responsável deve ter no máximo 20 caracteres.',

            'email.email' => 'Informe um endereço de e-mail válido.',
            'email.max' => 'O e-mail do responsável deve ter no máximo 255 caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'status.in' => 'O status deve ser active, inactive ou blocked.',
        ];
    }
}
