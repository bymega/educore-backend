<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentSearchRequest;
use App\Http\Resources\StudentCollection;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function __construct(private readonly StudentService $service) {}

    public function index(StudentSearchRequest $request): StudentCollection
    {
        $student = $this->service->getAll($request->validated());

        return new StudentCollection($student);
    }

    public function store(StudentRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Aluno cadastrado com sucesso.',
        ], 201);
    }

    public function update(StudentRequest $request, string $uuid): JsonResponse
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Aluno atualizado com sucesso.'
        ]);
    }
}
