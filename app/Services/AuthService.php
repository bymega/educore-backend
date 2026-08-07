<?php

namespace App\Services;

use App\Models\User;
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

        if ($user->status !== 'active') {
            throw new AuthenticationException(
                match ($user->status) {
                    'inactive' => 'Usuário inativo. Entre em contato com o administrador.',
                    'blocked' => 'Usuário bloqueado. Entre em contato com o administrador.',
                    default => 'Usuário sem permissão para acessar o sistema.',
                }
            );
        }

        $token = $this->repository->createToken($user);
        $this->repository->updateLastLogin($user);

        return [
            'token' => $token,
        ];
    }

    public function logout(User $user): void
    {
        $this->repository->revokeCurrentToken($user);
    }
}
