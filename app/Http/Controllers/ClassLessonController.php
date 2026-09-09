<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassLessonRequest;
use App\Http\Requests\ClassLessonSearchRequest;
use App\Http\Resources\ClassLessonCollection;
use App\Services\ClassLessonService;
use Illuminate\Http\JsonResponse;

class ClassLessonController extends Controller
{
    public function __construct(private readonly ClassLessonService $service) {}

    /**
     * Listar Aulas da Turma
     *
     * Retorna a lista paginada de aulas da turma.
     *
     * @group Aulas da Turma
     */
    public function index(ClassLessonSearchRequest $request): ClassLessonCollection
    {
        $classLessons = $this->service->getAll($request->validated());

        return new ClassLessonCollection($classLessons);
    }

    /**
     * Cadastrar Aulas da Turma
     *
     * @group Aulas da Turma
     */
    public function store(ClassLessonRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Aula criada com sucesso.'
        ]);
    }

    /**
     * Atualizar Aulas da Turma
     *
     * @group Aulas da Turma
     */
    public function update(ClassLessonRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Aula atualizada com sucesso.'
        ]);
    }

    /**
     * Deletar Aulas da Turma
     *
     * @group Aulas da Turma
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Aula excluída com sucesso.'
        ]);
    }

    /**
     * Restaurar Aulas da Turma
     *
     * @group Aulas da Turma
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Aula restaurada com sucesso.'
        ]);
    }
}
