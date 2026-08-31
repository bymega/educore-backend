<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Http\Requests\EnrollmentSearchRequest;
use App\Http\Resources\EnrollmentCollection;
use App\Services\EnrollmentService;
use Illuminate\Http\JsonResponse;

class EnrollmentController extends Controller
{
    public function __construct(private readonly EnrollmentService $service) {}

    /**
     * Listar Matrículas
     *
     * Retorna a lista paginada de matrículas.
     *
     * @group Matrículas
     */
    public function index(EnrollmentSearchRequest $request): EnrollmentCollection
    {
        $enrollments = $this->service->getAll($request->validated());

        return new EnrollmentCollection($enrollments);
    }

    /**
     * Cadastrar Matrículas
     *
     * @group Matrículas
     */
    public function store(EnrollmentRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Matrícula cadastrada com sucesso.'
        ]);
    }

    /**
     * Atualizar Matrículas
     *
     * @group Matrículas
     */
    public function update(EnrollmentRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Matrícula atualizada com sucesso.'
        ]);
    }

    /**
     * Deletar Matrículas
     *
     * @group Matrículas
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Matrícula excluída com sucesso.'
        ]);
    }

    /**
     * Restaurar Matrículas
     *
     * @group Matrículas
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Matrícula restaurada com sucesso.'
        ]);
    }
}
