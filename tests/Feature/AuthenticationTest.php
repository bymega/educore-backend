<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

function createLoginUser(array $attributes = []): User
{
    return User::factory()->create(array_merge([
        'email' => 'professor@educore.com',
        'password' => Hash::make('Senha123!'),
        'status' => 'active',
    ], $attributes));
}

test('active user can log in and last login is updated', function () {
    $this->travelTo(now()->startOfSecond());

    $user = createLoginUser();

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'Senha123!',
    ]);

    $response
        ->assertOk()
        ->assertJsonStructure(['token']);

    expect($response->json('token'))->toBeString()->not->toBeEmpty()
        ->and($user->fresh()->last_login_at->equalTo(now()))->toBeTrue();

    $this->assertDatabaseHas('personal_access_tokens', [
        'tokenable_id' => $user->id,
        'tokenable_type' => User::class,
    ]);
});

test('login fails when credentials are invalid', function () {
    $user = createLoginUser();

    $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'senha-incorreta',
    ])->assertUnauthorized();

    expect($user->fresh()->last_login_at)->toBeNull();
    $this->assertDatabaseCount('personal_access_tokens', 0);
});

test('login fails when user is not active', function (string $status) {
    $user = createLoginUser(['status' => $status]);

    $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'Senha123!',
    ])->assertUnauthorized();

    expect($user->fresh()->last_login_at)->toBeNull();
    $this->assertDatabaseCount('personal_access_tokens', 0);
})->with(['inactive', 'blocked']);

test('authenticated user can access lifetime endpoint', function () {
    $user = createLoginUser();
    $token = $user->createToken('auth_token')->plainTextToken;

    $this->withToken($token)
        ->getJson('/api/auth/life')
        ->assertOk()
        ->assertJsonPath('data.id', $user->uuid)
        ->assertJsonPath('data.email', $user->email)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'roles',
                'permissions',
            ],
        ]);
});

test('unauthenticated user cannot access protected endpoints', function () {
    $this->getJson('/api/auth/life')->assertUnauthorized();
    $this->postJson('/api/auth/logout')->assertUnauthorized();
});

test('logout revokes current token', function () {
    $user = createLoginUser();
    $token = $user->createToken('auth_token')->plainTextToken;

    $this->withToken($token)
        ->postJson('/api/auth/logout')
        ->assertOk()
        ->assertJson([
            'message' => 'Logout realizado com sucesso.',
        ]);

    $this->assertDatabaseCount('personal_access_tokens', 0);

    Auth::forgetGuards();

    $this->withToken($token)
        ->getJson('/api/auth/life')
        ->assertUnauthorized();
});
