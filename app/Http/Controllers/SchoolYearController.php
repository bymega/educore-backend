<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolYearRequest;
use App\Http\Requests\SchoolYearSearchRequest;
use App\Http\Resources\SchoolYearCollection;
use App\Services\SchoolYearService;
use Illuminate\Http\JsonResponse;

class SchoolYearController extends Controller
{
    public function __construct(private readonly SchoolYearService $service) {}

    /**
     * Listar Anos Letivos
     *
     * Retorna a lista paginada de anos letivos.
     *
     * @group Anos Letivos
     */
    public function index(SchoolYearSearchRequest $request): SchoolYearCollection
    {
        $schoolYears = $this->service->getAll($request->validated());

        return new SchoolYearCollection($schoolYears);
    }

    /**
     * Cadastrar Anos Letivos
     *
     * @group Anos Letivos
     */
    public function store(SchoolYearRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Ano Letivo cadastrado com sucesso.'
        ], 201);
    }

    /**
     * Atualizar Anos Letivos
     *
     * @group Anos Letivos
     */
    public function update(SchoolYearRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Ano Letivo atualizado com sucesso.',
        ]);
    }

    /**
     * Deletar Anos Letivos
     *
     * @group Anos Letivos
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Ano Letivo excluído com sucesso.'
        ]);
    }

    /**
     * Restaurar Anos Letivos
     *
     * @group Anos Letivos
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Ano Letivo restaurado com sucesso.'
        ]);
    }
}
