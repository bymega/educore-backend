<?php

namespace App\Http\Controllers;

use App\Http\Requests\TermRequest;
use App\Services\TermService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function __construct(private readonly TermService $service) {}

    public function store(TermRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Período cadastrado com sucesso.'
        ]);
    }
}
