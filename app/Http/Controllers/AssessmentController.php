<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Services\AssessmentService;
use Illuminate\Http\JsonResponse;

class AssessmentController extends Controller
{
    public function __construct(private readonly AssessmentService $service) {}

    public function store(AssessmentRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Avaliação cadastrada com sucesso.'
        ]);
    }
}
