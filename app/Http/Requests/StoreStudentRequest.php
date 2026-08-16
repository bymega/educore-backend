<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->whereNull('deleted_at'),
                Rule::unique('students', 'user_id'),
            ],
            'registration_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'registration_number'),
            ],
            'birth_date' => ['required', 'date', 'before:today'],
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
            'cpf' => [
                'nullable',
                'string',
                'digits:11',
                Rule::unique('students', 'cpf'),
            ],
            'address' => ['nullable', 'string', 'max:255'],
            'status' => ['sometimes', Rule::in(['active', 'inactive', 'blocked'])],
            'guardians' => ['required', 'array', 'min:1'],
            'guardians.*.name' => ['required', 'string', 'max:255'],
            'guardians.*.cpf' => [
                'required',
                'string',
                'distinct:strict',
                'digits:11',
            ],
            'guardians.*.phone' => ['nullable', 'string', 'max:20'],
            'guardians.*.email' => ['nullable', 'email', 'max:255'],
            'guardians.*.status' => ['sometimes', Rule::in(['active', 'inactive', 'blocked'])],
            'guardians.*.relationship' => ['required', 'string', 'max:255'],
            'guardians.*.is_primary' => ['required', 'boolean'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $guardians = $this->input('guardians', []);

        if (is_array($guardians)) {
            $guardians = collect($guardians)->map(function ($guardian) {
                if (! is_array($guardian)) {
                    return $guardian;
                }

                if (! empty($guardian['cpf'])) {
                    $guardian['cpf'] = preg_replace('/\D/', '', (string) $guardian['cpf']);
                }

                if (! empty($guardian['email'])) {
                    $guardian['email'] = mb_strtolower(trim((string) $guardian['email']));
                }

                return $guardian;
            })
                ->all();
        }

        $this->merge([
            'cpf' => $this->filled('cpf')
                ? preg_replace('/\D/', '', (string) $this->input('cpf'))
                : $this->input('cpf'),
            'guardians' => $guardians,
        ]);
    }

    /**
     * @return array<int, callable>
     */
    public function after(): array
    {
        return [
            function ($validator): void {
                $primaryCount = collect($this->input('guardians', []))
                    ->filter(fn ($guardian) => in_array(
                        $guardian['is_primary'] ?? false,
                        [true, 1, '1'],
                        true
                    ))
                    ->count();

                if ($primaryCount !== 1) {
                    $validator->errors()->add(
                        'guardians',
                        'Informe exatamente um responsável principal.'
                    );
                }
            },
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.exists' => 'O usuário informado não existe ou está excluído.',
            'user_id.unique' => 'Este usuário já possui um cadastro de aluno.',
            'registration_number.unique' => 'Esta matrícula já está cadastrada.',
            'birth_date.before' => 'A data de nascimento deve ser anterior à data atual.',
            'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'guardians.required' => 'Informe pelo menos um responsável.',
            'guardians.min' => 'Informe pelo menos um responsável.',
            'guardians.*.name.required' => 'Informe o nome do responsável.',
            'guardians.*.cpf.required' => 'Informe o CPF do responsável.',
            'guardians.*.cpf.distinct' => 'Não repita o mesmo responsável.',
            'guardians.*.cpf.digits' => 'O CPF do responsável deve conter exatamente 11 dígitos.',
            'guardians.*.relationship.required' => 'Informe o parentesco do responsável.',
        ];
    }
}
