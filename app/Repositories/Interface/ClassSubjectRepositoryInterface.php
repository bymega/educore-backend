<?php

namespace App\Repositories\Interface;

use App\Models\ClassSubject;

interface ClassSubjectRepositoryInterface
{
  public function assign(array $data): ClassSubject;

  public function findByUuidAndClassUuid(string $uuid, string $classUuid): ?ClassSubject;

  public function update(ClassSubject $entity, array $data): bool;

  public function delete(ClassSubject $entity): bool;

  public function restore(ClassSubject $entity): bool;
}
