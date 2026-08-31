<?php

namespace App\Repositories\Eloquent;

use App\Models\Enrollment;
use App\Repositories\Interface\EnrollmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EnrollmentRepository implements EnrollmentRepositoryInterface
{
  public function __construct(private readonly Enrollment $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity->newQuery()->with(['student.user', 'schoolClass']);

    if (! empty($data['student_name'])) {
      $studentName = mb_strtoupper($data['student_name']);

      $query->whereHas('student.user', function ($query) use ($studentName) {
        $query->whereRaw(
          'UPPER(name) LIKE ?',
          ["%{$studentName}%"]
        );
      });
    }

    if (! empty($data['school_class_name'])) {
      $schoolClassName = mb_strtoupper($data['school_class_name']);

      $query->whereHas('schoolClass', function ($query) use ($schoolClassName) {
        $query->whereRaw(
          'UPPER(name) LIKE ?',
          ["%{$schoolClassName}%"]
        );
      });
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function create(array $data): Enrollment
  {
    return $this->entity::create($data);
  }

  public function findByUuid(string $uuid): ?Enrollment
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function update(Enrollment $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function delete(Enrollment $entity): bool
  {
    return $entity->delete();
  }

  public function restore(Enrollment $entity): bool
  {
    return $entity->restore();
  }
}
