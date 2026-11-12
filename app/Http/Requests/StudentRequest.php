<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $uuid = $this->route('uuid');
        $student = Student::query()->where('uuid', $uuid)->first();

        if (! $student) {
            throw new NotFoundHttpException('Aluno não encontrado.');
        }

        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($student->user_id)],
            'password' => ['sometimes', 'nullable', 'string', 'min:8'],
            'birth_date' => ['sometimes', 'required', 'date', 'before:today'],
            'gender' => ['sometimes', 'nullable', Rule::in(['male', 'female', 'other'])],
            'cpf' => ['sometimes', 'nullable', 'string', 'digits:11', Rule::unique('students', 'cpf')->ignore($student->id)],
            'address' => ['sometimes', 'nullable', 'string', 'max:255'],
            'status' => ['sometimes', Rule::in(['active', 'inactive', 'blocked'])],
            'guardians' => ['sometimes', 'required', 'array', 'min:1'],
            'guardians.*.name' => ['required', 'string', 'max:255'],
            'guardians.*.cpf' => ['required', 'string', 'distinct:strict', 'digits:11'],
            'guardians.*.phone' => ['nullable', 'string', 'max:20'],
            'guardians.*.email' => ['nullable', 'email', 'max:255'],
            'guardians.*.status' => ['sometimes', Rule::in(['active', 'inactive', 'blocked'])],
            'guardians.*.relationship' => ['required', 'string', 'max:255'],
            'guardians.*.is_primary' => ['required', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $data = [];

        if ($this->exists('email') && $this->filled('email')) {
            $data['email'] = mb_strtolower(trim((string) $this->input('email')));
        }

        if ($this->exists('cpf') && $this->filled('cpf')) {
            $data['cpf'] = preg_replace('/\D/', '', (string) $this->input('cpf'));
        }

        if ($this->exists('guardians') && is_array($this->input('guardians'))) {
            $data['guardians'] = collect($this->input('guardians'))->map(function ($guardian) {
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
            })->all();
        }

        $this->merge($data);
    }

    public function after(): array
    {
        return [
            function ($validator): void {
                if (! $this->exists('guardians') || ! is_array($this->input('guardians'))) {
                    return;
                }

                $primaryCount = collect($this->input('guardians'))
                    ->filter(fn ($guardian) => is_array($guardian) && in_array(
                        $guardian['is_primary'] ?? false,
                        [true, 1, '1'],
                        true
                    ))
                    ->count();

                if ($primaryCount !== 1) {
                    $validator->errors()->add('guardians', 'Informe exatamente um responsável principal.');
                }
            },
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => ['example' => 'Ana Clara Oliveira'],
            'email' => ['example' => 'ana@example.com'],
            'password' => ['example' => 'NovaSenha@123', 'description' => 'Opcional; omita para manter a senha atual.'],
            'birth_date' => ['example' => '2014-08-25'],
            'gender' => ['example' => 'female'],
            'cpf' => ['example' => '52289012345'],
            'address' => ['example' => 'Rua das Flores, 123'],
            'status' => ['example' => 'active'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Este e-mail já está cadastrado.',
            'password.min' => 'A senha deve conter pelo menos 8 caracteres.',
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
