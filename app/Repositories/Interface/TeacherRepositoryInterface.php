<?php

namespace App\Repositories\Interface;

use App\Models\Teacher;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TeacherRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $data): Teacher;

  public function update(Teacher $entity, array $data);

  public function findByUuid(string $uuid): ?Teacher;

  public function delete(Teacher $entity): bool;

  public function restore(Teacher $entity): bool;
}
