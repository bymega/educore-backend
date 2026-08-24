<?php

namespace App\Repositories\Interface;

use App\Models\Subject;

interface SubjectRepositoryInterface
{
  public function create(array $data): Subject;

  public function update(Subject $entity, array $data): bool;

  public function findByUuid(string $uuid): ?Subject;
}
