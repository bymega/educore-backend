<?php

namespace App\Http\Controllers;

use App\Http\Requests\TermRequest;
use App\Http\Requests\TermSearchRequest;
use App\Http\Resources\TermCollection;
use App\Services\TermService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function __construct(private readonly TermService $service) {}

    /**
     * Listar Períodos
     *
     * Retorna a lista paginada de períodos.
     *
     * @group Períodos
     */
    public function index(TermSearchRequest $request): TermCollection
    {
        $terms = $this->service->getAll($request->validated());

        return new TermCollection($terms);
    }

    /**
     * Cadastrar Períodos
     *
     * @group Períodos
     */
    public function store(TermRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Período cadastrado com sucesso.'
        ]);
    }

    /**
     * Atualizar Períodos
     *
     * @group Períodos
     */
    public function update(TermRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Período atualizado com sucesso.'
        ]);
    }

    /**
     * Deletar Períodos
     *
     * @group Períodos
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Período excluído com sucesso.'
        ]);
    }

    /**
     * Restaurar Períodos
     *
     * @group Períodos
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Período restaurado com sucesso.'
        ]);
    }
}
