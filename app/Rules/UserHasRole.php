<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UserHasRole implements ValidationRule
{
    public function __construct(private readonly string $role) {}

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): void  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::query()->find($value);

        if (! $user || ! $user->hasRole($this->role)) {
            $fail("O usuário selecionado não está cadastrado como {$this->role}.");
        }
    }
}
