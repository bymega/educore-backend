<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentGradeRequest;
use App\Http\Requests\StudentGradeSearchRequest;
use App\Http\Resources\StudentGradeCollection;
use App\Services\StudentGradeService;
use Illuminate\Http\JsonResponse;

class StudentGradeController extends Controller
{
    public function __construct(private readonly StudentGradeService $service) {}

    /**
     * Listar Notas de Alunos
     *
     * Retorna a lista paginada de notas de alunos.
     *
     * @group Notas de Alunos
     */
    public function index(StudentGradeSearchRequest $request): StudentGradeCollection
    {
        $studentGrades = $this->service->getAll($request->validated());

        return new StudentGradeCollection($studentGrades);
    }

    /**
     * Cadastrar Notas de Alunos
     *
     * @group Notas de Alunos
     */
    public function store(StudentGradeRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Nota do aluno cadastrada com sucesso.'
        ]);
    }

    /**
     * Atualizar Notas de Alunos
     *
     * @group Notas de Alunos
     */
    public function update(StudentGradeRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Nota do aluno atualizada com sucesso.'
        ]);
    }

    /**
     * Deletar Notas de Alunos
     *
     * @group Notas de Alunos
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Nota do aluno excluída com sucesso.'
        ]);
    }

    /**
     * Restaurar Notas de Alunos
     *
     * @group Notas de Alunos
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Nota do aluno restaurada com sucesso.'
        ]);
    }
}
