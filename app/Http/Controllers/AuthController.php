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

    public function login(LoginRequest $request)
    {
        return response()->json($this->service->login($request->validated()));
    }

    public function lifetimeToken(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function logout(Request $request): JsonResponse
    {
        $this->service->logout($request->user());

        return response()->json([
            'message' => 'Logout realizado com sucesso.',
        ]);
    }
}
