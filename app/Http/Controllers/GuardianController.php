<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardianRequest;
use App\Http\Requests\GuardianSearchRequest;
use App\Http\Resources\GuardianCollection;
use App\Services\GuardianService;
use Illuminate\Http\JsonResponse;

class GuardianController extends Controller
{
    public function __construct(private readonly GuardianService $service) {}

    /**
     * Listar Responsáveis
     *
     * Retorna a lista paginada de responsáveis.
     *
     * @group Responsáveis
     */
    public function index(GuardianSearchRequest $request): GuardianCollection
    {
        $guardians = $this->service->getAll($request->validated());

        return new GuardianCollection($guardians);
    }

    /**
     * Atualizar Responsáveis
     *
     * @group Responsáveis
     */
    public function update(GuardianRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Responsável atualizado com sucesso.'
        ]);
    }

    /**
     * Deletar Responsáveis
     *
     * @group Responsáveis
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Responsável excluído com sucesso.'
        ]);
    }

    /**
     * Restaurar Responsáveis
     *
     * @group Responsáveis
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Responsável restaurado com sucesso.'
        ]);
    }
}
