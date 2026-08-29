<?php

namespace App\Services;

use App\Repositories\Interface\EducationLevelRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EducationLevelService
{
  public function __construct(private readonly EducationLevelRepositoryInterface $repository) {}

  public function getAll(): Collection
  {
    return $this->repository->getAll();
  }
}
