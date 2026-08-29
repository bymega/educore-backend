<?php

namespace App\Repositories\Interface;

use App\Models\ClassSubject;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ClassSubjectRepositoryInterface
{
  public function getAll(string $classUuid, array $data): LengthAwarePaginator;

  public function assign(array $data): ClassSubject;

  public function findByUuid(string $uuid): ?ClassSubject;

  public function findByUuidAndClassUuid(string $uuid, string $classUuid): ?ClassSubject;

  public function update(ClassSubject $entity, array $data): bool;

  public function delete(ClassSubject $entity): bool;

  public function restore(ClassSubject $entity): bool;
}
