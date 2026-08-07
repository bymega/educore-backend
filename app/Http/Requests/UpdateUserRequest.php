<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateUserRequest extends FormRequest
{
    /**
     * Ensure the user exists before validating the request data.
     */
    protected function prepareForValidation(): void
    {
        $uuid = $this->route('uuid');

        $exists = User::withTrashed()
            ->where('uuid', $uuid)
            ->exists();

        if (!$exists) {
            throw new NotFoundHttpException('Usuário não encontrado.');
        }
    }

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

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($this->route('uuid'), 'uuid'),
            ],

            'phone' => ['nullable', 'string', 'max:20'],

            'status' => [
                'required',
                Rule::in(['active', 'inactive', 'blocked']),
            ],

            'role' => [
                'required',
                'string',
                Rule::exists('roles', 'name')
                    ->where('guard_name', 'web'),
            ],
        ];
    }
}
