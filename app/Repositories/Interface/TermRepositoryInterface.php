<?php

namespace App\Repositories\Interface;

use App\Models\Term;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TermRepositoryInterface
{
    public function getAll(array $data): LengthAwarePaginator;

    public function create(array $data): Term;

    public function update(Term $entity, array $data): bool;

    public function findByUuid(string $uuid): ?Term;

    public function delete(Term $entity): bool;

    public function restore(Term $entity): bool;
}
