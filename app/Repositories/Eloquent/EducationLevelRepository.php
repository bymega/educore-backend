<?php

namespace App\Repositories\Eloquent;

use App\Models\EducationLevel;
use App\Repositories\Interface\EducationLevelRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class EducationLevelRepository implements EducationLevelRepositoryInterface
{
  public function __construct(private readonly EducationLevel $entity) {}

  public function getAll(): Collection
  {
    return $this->entity->newQuery()->orderBy('sort_order')->get();
  }
}
