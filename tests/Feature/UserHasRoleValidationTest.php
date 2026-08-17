<?php

use App\Models\User;
use App\Rules\UserHasRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

test('accepts a user with the required role', function (string $role) {
    Role::findOrCreate($role, 'web');

    $user = User::factory()->create();
    $user->assignRole($role);

    $validator = Validator::make(
        ['user_id' => $user->id],
        ['user_id' => [new UserHasRole($role)]]
    );

    expect($validator->passes())->toBeTrue();
})->with(['aluno', 'professor']);

test('rejects a user with an incompatible role', function (string $requiredRole, string $assignedRole) {
    Role::findOrCreate($requiredRole, 'web');
    Role::findOrCreate($assignedRole, 'web');

    $user = User::factory()->create();
    $user->assignRole($assignedRole);

    $validator = Validator::make(
        ['user_id' => $user->id],
        ['user_id' => [new UserHasRole($requiredRole)]]
    );

    expect($validator->fails())->toBeTrue()
        ->and($validator->errors()->first('user_id'))
        ->toBe("O usuário informado deve possuir o papel {$requiredRole}.");
})->with([
    ['aluno', 'professor'],
    ['professor', 'aluno'],
]);
