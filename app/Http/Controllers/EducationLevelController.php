<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationLevelResource;
use App\Services\EducationLevelService;

class EducationLevelController extends Controller
{
    public function  __construct(private readonly EducationLevelService $service) {}

    public function index()
    {
        return EducationLevelResource::collection(
            $this->service->getAll()
        );
    }
}
