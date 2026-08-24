<?php

namespace App\Repositories\Interface;

use App\Models\Subject;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SubjectRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $data): Subject;

  public function update(Subject $entity, array $data): bool;

  public function findByUuid(string $uuid): ?Subject;
}
