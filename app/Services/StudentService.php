<?php

namespace App\Services;

use App\Repositories\Interface\StudentRepositoryInterface;

class StudentService
{
  public function __construct(private readonly StudentRepositoryInterface $repository) {}

  public function getAll(array $data)
  {
    return $this->repository->getAll($data);
  }
}
