<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Repositories\Interface\StudentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentRepository implements StudentRepositoryInterface
{
    public function __construct(private readonly Student $entity) {}

    public function getAll(array $data): LengthAwarePaginator
    {
        $query = $this->entity->newQuery()->with('user');

        if (! empty($data['name'])) {
            $name = mb_strtoupper($data['name']);
            $query->whereHas('user', function ($query) use ($name) {
                $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
            });
        }

        $perPage = $data['per_page'] ?? 10;

        return $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function create(array $data): Student
    {
        return $this->entity::create($data);
    }

    public function update(Student $entity, array $data): bool
    {
        return $entity->update($data);
    }

    public function findByUuid(string $uuid): ?Student
    {
        return $this->entity::withTrashed()->where('uuid', $uuid)->first();
    }

    public function delete(Student $entity): bool
    {
        return $entity->delete();
    }

    public function restore(Student $entity): bool
    {
        return $entity->restore();
    }
}
