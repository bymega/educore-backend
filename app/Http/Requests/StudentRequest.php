<?php

namespace App\Http\Requests;

use App\Models\Student;
use App\Rules\UserHasRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        $studentId = null;

        if ($uuid = $this->route('uuid')) {
            $studentId = Student::query()
                ->where('uuid', $uuid)
                ->value('id');

            if (! $studentId) {
                throw new NotFoundHttpException('Aluno não encontrado.');
            }
        }

        return [
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->whereNull('deleted_at'),
                new UserHasRole('aluno'),
                Rule::unique('students', 'user_id')->ignore($studentId),
            ],
            'registration_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'registration_number')->ignore($studentId),
            ],
            'birth_date' => ['required', 'date', 'before:today'],
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
            'cpf' => [
                'nullable',
                'string',
                'digits:11',
                Rule::unique('students', 'cpf')->ignore($studentId),
            ],
            'address' => ['nullable', 'string', 'max:255'],
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
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'user_id' => ['example' => 1],
            'registration_number' => ['example' => 'STD101'],
            'birth_date' => ['example' => '2010-05-15'],
            'gender' => ['example' => 'female'],
            'cpf' => ['example' => '52289012345'],
            'address' => ['example' => 'Rua das Flores, 123'],
            'status' => ['example' => 'active'],
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
        ];
    }
}
