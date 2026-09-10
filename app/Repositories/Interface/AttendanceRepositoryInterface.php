<?php

namespace App\Repositories\Interface;

use App\Models\Attendance;

interface AttendanceRepositoryInterface
{
  public function create(array $data): Attendance;

  public function update(Attendance $entity, array $data): bool;

  public function findByUuid(string $uuid): ?Attendance;

  public function delete(Attendance $entity): bool;

  public function restore(Attendance $entity): bool;
}
