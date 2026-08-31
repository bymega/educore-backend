<?php

namespace App\Repositories\Interface;

use App\Models\Enrollment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EnrollmentRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $data): Enrollment;

  public function update(Enrollment $entity, array $data): bool;

  public function findByUuid(string $uuid): ?Enrollment;

  public function delete(Enrollment $entity): bool;

  public function restore(Enrollment $entity): bool;
}
