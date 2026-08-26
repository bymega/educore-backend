<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassSubjectRequest;
use App\Services\ClassSubjectService;
use Illuminate\Http\JsonResponse;

class ClassSubjectController extends Controller
{
    public function __construct(private readonly ClassSubjectService $service) {}

    public function store(string $classUuid, ClassSubjectRequest $request): JsonResponse
    {
        $this->service->assign($classUuid, $request->validated());

        return response()->json([
            'message' => 'Disciplinas atribuída à turma com sucesso'
        ], 201);
    }
}
