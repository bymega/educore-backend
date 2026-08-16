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

    public function index(GuardianSearchRequest $request): GuardianCollection
    {
        $guardians = $this->service->getAll($request->validated());

        return new GuardianCollection($guardians);
    }

    public function update(GuardianRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Responsável atualizado com sucesso.'
        ]);
    }
}
