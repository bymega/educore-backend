<?php

namespace App\Services;

use App\Repositories\Interface\StudentGradeRepositoryInterface;

class StudentGradeService
{
  public function __construct(private readonly StudentGradeRepositoryInterface $repository) {}

  public function create(array $data)
  {
    return $this->repository->create($data);
  }
}
