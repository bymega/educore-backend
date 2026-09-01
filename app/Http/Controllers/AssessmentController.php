<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Requests\AssessmentSearchRequest;
use App\Http\Resources\AssessmentCollection;
use App\Services\AssessmentService;
use Illuminate\Http\JsonResponse;

class AssessmentController extends Controller
{
    public function __construct(private readonly AssessmentService $service) {}

    /**
     * Listar Avaliações
     *
     * Retorna a lista paginada de avaliações.
     *
     * @group Avaliações
     */
    public function index(AssessmentSearchRequest $request): AssessmentCollection
    {
        $assessments = $this->service->getAll($request->validated());

        return new AssessmentCollection($assessments);
    }

    /**
     * Cadastrar Avaliações
     *
     * @group Avaliações
     */
    public function store(AssessmentRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Avaliação cadastrada com sucesso.'
        ]);
    }

    /**
     * Atualizar Avaliação
     *
     * @group Avaliações
     */
    public function update(AssessmentRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Avaliação atualizada com sucesso.'
        ]);
    }

    /**
     * Deletar Avaliações
     *
     * @group Avaliações
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Avaliação excluída com sucesso.'
        ]);
    }

    /**
     * Restaurar Avaliações
     *
     * @group Avaliações
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Avaliação restaurada com sucesso.'
        ]);
    }
}
