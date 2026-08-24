<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClassRequest;
use App\Services\SchoolClassService;
use Illuminate\Http\JsonResponse;

class SchoolClassController extends Controller
{
    public function __construct(private readonly SchoolClassService $service) {}

    public function store(SchoolClassRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Turma criada com sucesso.'
        ]);
    }

    public function update(string $uuid, SchoolClassRequest $request): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Turma atualizada com sucesso'
        ]);
    }
}
