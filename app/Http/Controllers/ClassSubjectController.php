<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassSubjectRequest;
use App\Http\Requests\ClassSubjectSearchRequest;
use App\Http\Requests\UpdateClassSubjectRequest;
use App\Http\Resources\ClassSubjectCollection;
use App\Services\ClassSubjectService;
use Illuminate\Http\JsonResponse;

class ClassSubjectController extends Controller
{
    public function __construct(private readonly ClassSubjectService $service) {}

    /**
     * Listar Disciplinas da Turma
     *
     * Retorna a lista paginada de disciplinas da turma.
     *
     * @group Disciplinas da Turma
     */
    public function index(string $classUuid, ClassSubjectSearchRequest $request): ClassSubjectCollection
    {
        $classSubjects = $this->service->getAll($classUuid, $request->validated());

        return new ClassSubjectCollection($classSubjects);
    }


    /**
     * Atribuir Disciplinas à Turma
     *
     * @group Disciplinas da Turma
     */
    public function store(string $classUuid, ClassSubjectRequest $request): JsonResponse
    {
        $this->service->assign($classUuid, $request->validated());

        return response()->json([
            'message' => 'Disciplinas atribuída à turma com sucesso'
        ], 201);
    }

    /**
     * Atualizar Disciplinas da Turma
     *
     * @group Disciplinas da Turma
     */
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

    /**
     * Deletar Disciplinas da Turma
     *
     * @group Disciplinas da Turma
     */
    public function delete(string $classUuid, string $uuid)
    {
        $this->service->delete($classUuid, $uuid);

        return response()->json([
            'message' => 'Disciplina removida da turma com sucesso',
        ]);
    }

    /**
     * Restaurar Disciplinas da Turma
     *
     * @group Disciplinas da Turma
     */
    public function restore(string $classUuid, string $uuid)
    {
        $this->service->restore($classUuid, $uuid);

        return response()->json([
            'message' => 'Disciplina da turma restaurada com sucesso'
        ]);
    }
}
