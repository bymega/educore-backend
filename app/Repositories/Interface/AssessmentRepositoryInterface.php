<?php

namespace App\Repositories\Interface;

use App\Models\Assessment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AssessmentRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $data): Assessment;

  public function update(Assessment $entity, array $data): bool;

  public function findByUuid(string $uuid): ?Assessment;

  public function delete(Assessment $entity): bool;

  public function restore(Assessment $entity): bool;
}
