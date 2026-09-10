<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Services\AttendanceService;
use Illuminate\Http\JsonResponse;

class AttendanceController extends Controller
{
    public function __construct(private readonly AttendanceService $service) {}

    public function store(AttendanceRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Frequência criada com sucesso.'
        ]);
    }

    public function update(AttendanceRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Frequência atualizada com sucesso.'
        ]);
    }

    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Frequência excluída com sucesso.'
        ]);
    }

    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Frequência restaurada com sucesso.'
        ]);
    }
}
