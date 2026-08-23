<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationLevelResource;
use App\Services\EducationLevelService;

class EducationLevelController extends Controller
{
    public function __construct(private readonly EducationLevelService $service) {}

    /**
     * Listar Níveis de Ensino
     *
     * Retorna todos os níveis de ensino cadastrados, ordenados pela ordem de exibição.
     *
     * @group Níveis de Ensino
     */
    public function index()
    {
        return EducationLevelResource::collection(
            $this->service->getAll()
        );
    }
}
