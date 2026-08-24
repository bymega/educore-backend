<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Http\Requests\SubjectSearchRequest;
use App\Http\Resources\SubjectCollection;
use App\Services\SubjectService;
use Illuminate\Http\JsonResponse;

class SubjectController extends Controller
{
    public function __construct(private readonly SubjectService $service) {}

    public function index(SubjectSearchRequest $request): SubjectCollection
    {
        $subjects = $this->service->getAll($request->validated());

        return new SubjectCollection($subjects);
    }

    /**
     * Cadastrar Disciplinas
     *
     * @group Disciplinas
     */
    public function store(SubjectRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Disciplina cadastrada com sucesso.'
        ]);
    }

    /**
     * Atualizar Disciplinas
     *
     * @group Disciplinas
     */
    public function update(SubjectRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Disciplina atualizada com sucesso'
        ]);
    }
}
