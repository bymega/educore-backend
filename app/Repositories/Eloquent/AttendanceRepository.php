<?php

namespace App\Repositories\Eloquent;

use App\Models\Attendance;
use App\Repositories\Interface\AttendanceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    public function __construct(private readonly Attendance $entity) {}

    public function getAll(array $data): LengthAwarePaginator
    {
        $query = $this->entity
            ->newQuery()
            ->with(['classLesson', 'enrollment']);

        if (isset($data['class_lesson_id'])) {
            $query->where('class_lesson_id', $data['class_lesson_id']);
        }

        if (isset($data['enrollment_id'])) {
            $query->where('enrollment_id', $data['enrollment_id']);
        }

        if (isset($data['status'])) {
            $query->where('status', $data['status']);
        }

        $perPage = $data['per_page'] ?? 10;

        return $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

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
