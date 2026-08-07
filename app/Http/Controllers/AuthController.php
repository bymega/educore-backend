<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $service
    ) {}

    /**
     * Login
     *
     * Autentica o usuário e retorna um token de acesso.
     *
     * @group Autenticação
     * @unauthenticated
     */
    public function login(LoginRequest $request)
    {
        return response()->json($this->service->login($request->validated()));
    }

    /**
     * Get Lifetime Token
     *
     * Retorna o token de acesso do usuário.
     *
     * @group Autenticação
     * @authenticated
     */
    public function lifetimeToken(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    /**
     * Logout
     *
     * Realiza o logout do usuário, revogando o token de acesso.
     *
     * @group Autenticação
     * @authenticated
     */
    public function logout(Request $request): JsonResponse
    {
        $this->service->logout($request->user());

        return response()->json([
            'message' => 'Logout realizado com sucesso.',
        ]);
    }
}
