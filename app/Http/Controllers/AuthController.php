<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $service
    ) {}

    public function login(LoginRequest $request)
    {
        return response()->json($this->service->login($request->validated()));
    }

    /*public function me(Request $request)
    {
        // Return authenticated user information
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        // Handle logout logic here
    }*/
}
