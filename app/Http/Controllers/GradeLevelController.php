<?php

namespace App\Http\Controllers;

use App\Http\Resources\GradeLevelResource;
use App\Services\GradeLevelService;

class GradeLevelController extends Controller
{
    public function __construct(private readonly GradeLevelService $service) {}

    /**
     * Listar Anos Escolares
     *
     * Retorna todos os níveis de anos escolares cadastrados, ordenados pela ordem de exibição.
     *
     * @group Anos Escolares
     */
    public function index()
    {
        return GradeLevelResource::collection(
            $this->service->getAll()
        );
    }
}
