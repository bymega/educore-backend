<?php

namespace App\Services;

use App\Repositories\Interface\GradeLevelRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GradeLevelService
{
  public function __construct(private readonly GradeLevelRepositoryInterface $repository) {}

  public function getAll(): Collection
  {
    return $this->repository->getAll();
  }
}
