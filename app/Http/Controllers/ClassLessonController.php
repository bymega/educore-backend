<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassLessonRequest;
use App\Services\ClassLessonService;
use Illuminate\Http\JsonResponse;

class ClassLessonController extends Controller
{
    public function __construct(private readonly ClassLessonService $service) {}

    public function store(ClassLessonRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Aula criada com sucesso.'
        ]);
    }
}
