<?php

namespace App\Repositories\Eloquent;

use App\Models\Guardian;
use App\Repositories\Interface\GuardianRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GuardianRepository implements GuardianRepositoryInterface
{
    public function __construct(private readonly Guardian $entity) {}

    public function getAll(array $data): LengthAwarePaginator
    {
        $query = $this->entity->newQuery()->with('students');

        if (! empty($data['name'])) {
            $name = mb_strtoupper($data['name']);
            $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
        }

        if (! empty($data['cpf'])) {
            $cpf = mb_strtoupper($data['cpf']);
            $query->whereRaw('UPPER(cpf) LIKE ?', ["%{$cpf}%"]);
        }

        $perPage = $data['per_page'] ?? 10;

        return $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function update(Guardian $entity, array $data): bool
    {
        return $entity->update($data);
    }

    public function findByUuid(string $uuid): ?Guardian
    {
        return $this->entity::withTrashed()->where('uuid', $uuid)->first();
    }
}
