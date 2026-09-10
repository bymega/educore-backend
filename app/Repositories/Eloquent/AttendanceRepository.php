<?php

namespace App\Repositories\Eloquent;

use App\Models\Attendance;
use App\Repositories\Interface\AttendanceRepositoryInterface;

class AttendanceRepository implements AttendanceRepositoryInterface
{
  public function __construct(private readonly Attendance $entity) {}


  public function create(array $data): Attendance
  {
    return $this->entity->create($data);
  }

  public function findByUuid(string $uuid): ?Attendance
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function update(Attendance $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function delete(Attendance $entity): bool
  {
    return $entity->delete();
  }

  public function restore(Attendance $entity): bool
  {
    return $entity->restore();
  }
}
