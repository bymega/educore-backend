<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassSubjectTeacherRequest;
use App\Http\Requests\TeacherSearchRequest;
use App\Http\Requests\UpdateClassSubjectTeacher;
use App\Http\Resources\ClassSubjectTeacherCollection;
use App\Services\ClassSubjectTeacherService;
use Illuminate\Http\JsonResponse;

class ClassSubjectTeacherController extends Controller
{
    public function __construct(private readonly ClassSubjectTeacherService $service) {}

    public function index(string $classUuid, TeacherSearchRequest $request): ClassSubjectTeacherCollection
    {
        $classTeachers = $this->service->getAll($classUuid, $request->validated());

        return new ClassSubjectTeacherCollection($classTeachers);
    }

    public function store(string $classUuid, ClassSubjectTeacherRequest $request): JsonResponse
    {
        $this->service->assign($classUuid, $request->validated());

        return response()->json([
            'message' => 'Professor(es) atribuído(s) à disciplina com sucesso.'
        ]);
    }

    public function update(string $classUuid, string $uuid, UpdateClassSubjectTeacher $request): JsonResponse
    {
        $this->service->update($classUuid, $uuid, $request->validated());

        return response()->json([
            'message' => 'Professor atribuído atualizado com sucesso.'
        ]);
    }

    public function delete(string $classUuid, string $uuid)
    {
        $this->service->delete($classUuid, $uuid);

        return response()->json([
            'message' => 'Professor atribúido excluído com sucesso.'
        ]);
    }

    public function restore(string $classUuid, string $uuid)
    {
        $this->service->restore($classUuid, $uuid);

        return response()->json([
            'message' => 'Professor atribuído restaurado com sucesso.'
        ]);
    }
}
