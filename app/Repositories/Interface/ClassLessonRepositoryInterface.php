<?php

namespace App\Repositories\Interface;

use App\Models\ClassLesson;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ClassLessonRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $date): ClassLesson;

  public function update(ClassLesson $entity, array $data): bool;

  public function findByUuid(string $uuid): ?ClassLesson;

  public function delete(ClassLesson $entity): bool;

  public function restore(ClassLesson $entity): bool;
}
