<?php

namespace App\Services;

use App\Repositories\Interface\AuthRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private readonly AuthRepositoryInterface $repository
    ) {}

    public function login(array $credentials): array
    {
        $user = $this->repository->findByEmail($credentials['email']);

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw new AuthenticationException('Credenciais inválidas.');
        }

        return [
            'token' => $this->repository->createToken($user),
        ];
    }
}
