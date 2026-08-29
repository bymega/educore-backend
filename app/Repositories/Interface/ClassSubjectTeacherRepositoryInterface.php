<?php

namespace App\Repositories\Interface;

use App\Models\ClassSubjectTeacher;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ClassSubjectTeacherRepositoryInterface
{
  public function getAll(string $classUuid, array $data): LengthAwarePaginator;

  public function assign(array $data): ClassSubjectTeacher;

  public function findByUuidAndClassUuid(string $uuid, string $classUuid): ?ClassSubjectTeacher;

  public function update(ClassSubjectTeacher $entity, array $data): bool;

  public function delete(ClassSubjectTeacher $entity): bool;

  public function restore(ClassSubjectTeacher $entity): bool;
}
