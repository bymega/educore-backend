<?php

namespace App\Services;

use App\Repositories\Interface\AssessmentRepositoryInterface;

class AssessmentService
{
  public function __construct(private readonly AssessmentRepositoryInterface $repository) {}

  public function create(array $data)
  {
    return $this->repository->create($data);
  }
}
