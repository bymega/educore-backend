<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClassRequest;
use App\Http\Requests\SchoolClassSearchRequest;
use App\Http\Resources\SchoolClassCollection;
use App\Services\SchoolClassService;
use Illuminate\Http\JsonResponse;

class SchoolClassController extends Controller
{
    public function __construct(private readonly SchoolClassService $service) {}

    /**
     * Listar Turmas
     *
     * Retorna a lista paginada de turmas.
     *
     * @group Turmas
     */
    public function index(SchoolClassSearchRequest $request): SchoolClassCollection
    {
        $schoolClasses = $this->service->getAll($request->validated());

        return new SchoolClassCollection($schoolClasses);
    }

    /**
     * Cadastrar Turmas
     *
     * @group Turmas
     */
    public function store(SchoolClassRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Turma criada com sucesso.'
        ]);
    }

    /**
     * Atualizar Turmas
     *
     * @group Turmas
     */
    public function update(string $uuid, SchoolClassRequest $request): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Turma atualizada com sucesso'
        ]);
    }

    /**
     * Deletar Turmas
     *
     * @group Turmas
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Turma excluída com sucesso'
        ]);
    }

    /**
     * Restaurar Turmas
     *
     * @group Turmas
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Turma restaurada com sucesso'
        ]);
    }
}
