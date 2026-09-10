<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\AttendanceSearchRequest;
use App\Http\Resources\AttendanceCollection;
use App\Services\AttendanceService;
use Illuminate\Http\JsonResponse;

class AttendanceController extends Controller
{
    public function __construct(private readonly AttendanceService $service) {}

    /**
     * Listar Frequências
     *
     * Retorna a lista paginada de frequências.
     *
     * @group Frequências
     */
    public function index(AttendanceSearchRequest $request): AttendanceCollection
    {
        $attendances = $this->service->getAll($request->validated());

        return new AttendanceCollection($attendances);
    }

    /**
     * Cadastrar Frequências
     *
     * @group Frequências
     */
    public function store(AttendanceRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Frequência criada com sucesso.'
        ]);
    }

    /**
     * Atualizar Frequências
     *
     * @group Frequências
     */
    public function update(AttendanceRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Frequência atualizada com sucesso.'
        ]);
    }

    /**
     * Deletar Frequências
     *
     * @group Frequências
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Frequência excluída com sucesso.'
        ]);
    }

    /**
     * Restaurar Frequências
     *
     * @group Frequências
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Frequência restaurada com sucesso.'
        ]);
    }
}
