<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentGradeRequest;
use App\Services\StudentGradeService;
use Illuminate\Http\JsonResponse;

class StudentGradeController extends Controller
{
    public function __construct(private readonly StudentGradeService $service) {}

    public function store(StudentGradeRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Nota do aluno cadastrada com sucesso.'
        ]);
    }
}
