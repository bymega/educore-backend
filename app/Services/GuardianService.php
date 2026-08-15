<?php

namespace App\Services;

use App\Repositories\Interface\GuardianRepositoryInterface;

class GuardianService
{
  public function __construct(private readonly GuardianRepositoryInterface $repository) {}

  public function getAll(array $data)
  {
    return $this->repository->getAll($data);
  }
}
