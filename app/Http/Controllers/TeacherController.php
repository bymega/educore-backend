<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherSearchRequest;
use App\Http\Resources\TeacherCollection;
use App\Services\TeacherService;
use Illuminate\Http\JsonResponse;

class TeacherController extends Controller
{

    public function __construct(private readonly TeacherService $service) {}

    /**
     * Listar Professores
     *
     * Retorna a lista paginada de professores.
     *
     * @group Professores
     */
    public function index(TeacherSearchRequest $request): TeacherCollection
    {
        $teachers = $this->service->getAll($request->validated());

        return new TeacherCollection($teachers);
    }

    /**
     * Cadastrar Professores
     *
     * @group Professores
     */
    public function store(TeacherRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Professor cadastrado com sucesso.',
        ], 201);
    }

    /**
     * Atualizar Professores
     *
     * @group Professores
     */
    public function update(TeacherRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Professor atualizado com sucesso.',
        ]);
    }

    /**
     * Deletar Professores
     *
     * @group Professores
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Professor excluído com sucesso'
        ]);
    }

    /**
     * Restaurar Professores
     *
     * @group Professores
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Professor restaurado com sucesso.'
        ]);
    }
}
