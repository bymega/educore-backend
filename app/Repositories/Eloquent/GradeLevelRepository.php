<?php

namespace App\Repositories\Eloquent;

use App\Models\GradeLevel;
use App\Repositories\Interface\GradeLevelRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GradeLevelRepository implements GradeLevelRepositoryInterface
{
  public function __construct(private readonly GradeLevel $entity) {}

  public function getAll(): Collection
  {
    return $this->entity->newQuery()
      ->with('educationLevel')
      ->orderBy('sort_order')
      ->get();
  }
}
