<?php

use App\Models\Guardian;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

uses(RefreshDatabase::class);

beforeEach(function () {
    app(PermissionRegistrar::class)->forgetCachedPermissions();

    $studentRole = Role::create([
        'name' => 'aluno',
        'guard_name' => 'web',
    ]);

    $adminRole = Role::create([
        'name' => 'administrador',
        'guard_name' => 'web',
    ]);

    $permission = Permission::create([
        'name' => 'students.create',
        'guard_name' => 'web',
    ]);

    $adminRole->givePermissionTo($permission);

    $admin = User::factory()->create();
    $admin->assignRole($adminRole);

    app(PermissionRegistrar::class)->forgetCachedPermissions();
    Sanctum::actingAs($admin);
});

function studentCreationPayload(array $overrides = []): array
{
    return array_replace_recursive([
        'name' => 'Maria da Silva',
        'email' => 'maria.silva@escola.gov.br',
        'password' => 'SenhaSegura123',
        'registration_number' => 'STD2026001',
        'birth_date' => '2010-05-15',
        'gender' => 'female',
        'cpf' => '52998224725',
        'address' => 'Travessa 7 de maio, 89',
        'status' => 'active',
        'guardians' => [
            [
                'name' => 'Maria Clara da Silva',
                'cpf' => '12345678901',
                'phone' => '71999999999',
                'email' => 'responsavel@example.com',
                'status' => 'active',
                'relationship' => 'mother',
                'is_primary' => true,
            ],
        ],
    ], $overrides);
}

test('creates user student and guardians in one request', function () {
    $response = $this->postJson('/api/students', studentCreationPayload());

    $response
        ->assertCreated()
        ->assertJsonPath('user.name', 'Maria da Silva')
        ->assertJsonPath('user.email', 'maria.silva@escola.gov.br')
        ->assertJsonPath('guardians.0.name', 'Maria Clara da Silva')
        ->assertJsonPath('guardians.0.pivot.relationship', 'mother')
        ->assertJsonPath('guardians.0.pivot.is_primary', true)
        ->assertJsonMissingPath('user.password');

    $userId = $response->json('user.id');
    $studentId = $response->json('id');

    $this->assertDatabaseHas('users', [
        'id' => $userId,
        'email' => 'maria.silva@escola.gov.br',
    ]);

    $this->assertDatabaseHas('students', [
        'id' => $studentId,
        'user_id' => $userId,
        'registration_number' => 'STD2026001',
    ]);

    $this->assertDatabaseHas('guardians', [
        'cpf' => '12345678901',
        'email' => 'responsavel@example.com',
    ]);

    $this->assertDatabaseHas('guardian_student', [
        'student_id' => $studentId,
        'relationship' => 'mother',
        'is_primary' => true,
    ]);

    expect(Hash::check('SenhaSegura123', $response->json('user.password') ?? User::findOrFail($userId)->password))
        ->toBeTrue();

    expect(User::findOrFail($userId)->hasRole('aluno'))->toBeTrue();
});

test('rolls back user and student when guardian creation fails', function () {
    Guardian::query()->create([
        'name' => 'Responsável já cadastrado',
        'cpf' => '98765432100',
        'email' => 'responsavel@example.com',
        'phone' => '71988887777',
        'status' => 'active',
    ]);

    $response = $this->postJson('/api/students', studentCreationPayload([
        'email' => 'rollback.student@escola.gov.br',
        'registration_number' => 'STDROLLBACK01',
        'guardians' => [
            [
                'name' => 'Outro responsável',
                'cpf' => '11122233344',
                'phone' => '71999990000',
                'email' => 'responsavel@example.com',
                'status' => 'active',
                'relationship' => 'father',
                'is_primary' => true,
            ],
        ],
    ]));

    $response->assertServerError();

    $this->assertDatabaseMissing('users', [
        'email' => 'rollback.student@escola.gov.br',
    ]);

    $this->assertDatabaseMissing('students', [
        'registration_number' => 'STDROLLBACK01',
    ]);

    $this->assertDatabaseCount('guardians', 1);
});
