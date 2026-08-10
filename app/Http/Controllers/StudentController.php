<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentCollection;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(private readonly StudentService $service) {}

    public function index(StudentRequest $request): StudentCollection
    {
        $student = $this->service->getAll($request->validated());

        return new StudentCollection($student);
    }
}
