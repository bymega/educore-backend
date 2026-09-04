<?php

namespace App\Repositories\Interface;

use App\Models\StudentGrade;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StudentGradeRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $data): StudentGrade;

  public function update(StudentGrade $entity, array $data): bool;

  public function findByUuid(string $uuid): ?StudentGrade;

  public function delete(StudentGrade $entity): bool;

  public function restore(StudentGrade $entity): bool;
}
