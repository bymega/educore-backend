<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentSearchRequest;
use App\Http\Resources\StudentCollection;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function __construct(private readonly StudentService $service) {}

    /**
     * Listar Alunos
     *
     * Retorna a lista paginada de alunos.
     *
     * @group Alunos
     */
    public function index(StudentSearchRequest $request): StudentCollection
    {
        $student = $this->service->getAll($request->validated());

        return new StudentCollection($student);
    }

    /**
     * Cadastrar Alunos
     *
     * @group Alunos
     */
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Aluno cadastrado com sucesso.',
        ], 201);
    }

    /**
     * Atualizar Alunos
     *
     * @group Alunos
     */
    public function update(StudentRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Aluno atualizado com sucesso.',
        ]);
    }

    /**
     * Deletar Alunos
     *
     * @group Alunos
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Aluno excluído com sucesso',
        ]);
    }

    /**
     * Restaurar Alunos
     *
     * @group Alunos
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Aluno restaurado com sucesso',
        ]);
    }
}
