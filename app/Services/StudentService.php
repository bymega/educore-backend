<?php

namespace App\Services;

use App\Models\Guardian;
use App\Repositories\Interface\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentService
{
    public function __construct(private readonly StudentRepositoryInterface $repository) {}

    public function getAll(array $data)
    {
        return $this->repository->getAll($data);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $guardians = $data['guardians'];

            unset($data['guardians']);

            $student = $this->repository->create($data);

            foreach ($guardians as $guardianData) {
                $pivotData = [
                    'relationship' => $guardianData['relationship'],
                    'is_primary' => $guardianData['is_primary'],
                ];

                unset($guardianData['relationship'], $guardianData['is_primary']);

                $guardian = Guardian::query()->firstOrCreate(
                    ['cpf' => $guardianData['cpf']],
                    $guardianData
                );

                $student->guardians()->attach($guardian->id, $pivotData);
            }

            return $student->load('guardians');
        });
    }

    public function update(string $uuid, array $data)
    {
        $student = $this->repository->findByUuid($uuid);

        if (! $student) {
            throw new NotFoundHttpException('Aluno não encontrado');
        }

        return $this->repository->update($student, $data);
    }

    public function delete(string $uuid): void
    {
        $student = $this->repository->findByUuid($uuid);

        if (! $student) {
            throw new NotFoundHttpException('Aluno não encontrado.');
        }

        $this->repository->delete($student);
    }

    public function restore(string $uuid): void
    {
        $student = $this->repository->findByUuid($uuid);

        if (! $student) {
            throw new NotFoundHttpException('Aluno não encontrado.');
        }

        $this->repository->restore($student);
    }
}
