<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardianSearchRequest;
use App\Http\Resources\GuardianCollection;
use App\Services\GuardianService;


class GuardianController extends Controller
{
    public function __construct(private readonly GuardianService $service) {}

    public function index(GuardianSearchRequest $request): GuardianCollection
    {
        $guardians = $this->service->getAll($request->validated());

        return new GuardianCollection($guardians);
    }
}
