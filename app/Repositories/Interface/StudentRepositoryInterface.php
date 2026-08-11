<?php

namespace App\Repositories\Interface;

use App\Models\Student;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StudentRepositoryInterface
{
    public function getAll(array $data): LengthAwarePaginator;

    public function create(array $data): Student;

    public function update(Student $entity, array $data): bool;

    public function findByUuid(string $uuid): ?Student;
}
