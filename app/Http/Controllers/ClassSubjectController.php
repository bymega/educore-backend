<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassSubjectRequest;
use App\Http\Requests\UpdateClassSubjectRequest;
use App\Services\ClassSubjectService;
use Illuminate\Http\JsonResponse;
use Knuckles\Scribe\Extracting\Shared\ValidationRulesFinders\ThisValidate;

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

    public function update(
        string $classUuid,
        string $uuid,
        UpdateClassSubjectRequest $request
    ): JsonResponse {
        $this->service->update($classUuid, $uuid, $request->validated());

        return response()->json([
            'message' => 'Disciplina da turma atualizada com sucesso'
        ]);
    }

    public function delete(string $classUuid, string $uuid)
    {
        $this->service->delete($classUuid, $uuid);

        return response()->json([
            'message' => 'Disciplina removida da turma com sucesso',
        ]);
    }

    public function restore(string $classUuid, string $uuid)
    {
        $this->service->restore($classUuid, $uuid);

        return response()->json([
            'message' => 'Disciplina da turma restaurada com sucesso'
        ]);
    }
}
