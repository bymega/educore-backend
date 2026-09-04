<?php

namespace App\Repositories\Eloquent;

use App\Models\StudentGrade;
use App\Repositories\Interface\StudentGradeRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentGradeRepository implements StudentGradeRepositoryInterface
{
  public function __construct(private readonly StudentGrade $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity
      ->newQuery()
      ->with([
        'enrollment.student.user',
        'assessment.classSubject.subject',
        'assessment.term',
      ]);

    if (! empty($data['enrollment_id'])) {
      $query->where(
        'enrollment_id',
        $data['enrollment_id']
      );
    }

    if (! empty($data['assessment_id'])) {
      $query->where(
        'assessment_id',
        $data['assessment_id']
      );
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function create(array $data): StudentGrade
  {
    return $this->entity->create($data);
  }

  public function findByUuid(string $uuid): ?StudentGrade
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function update(StudentGrade $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function delete(StudentGrade $entity): bool
  {
    return $entity->delete();
  }

  public function restore(StudentGrade $entity): bool
  {
    return $entity->restore();
  }
}
