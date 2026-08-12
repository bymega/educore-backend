<?php

namespace App\Services;

use App\Repositories\Interface\StudentRepositoryInterface;
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
    return $this->repository->create($data);
  }

  public function update(string $uuid, array $data)
  {
    $student = $this->repository->findByUuid($uuid);

    if (!$student) {
      throw new NotFoundHttpException('Aluno não encontrado');
    }

    return $this->repository->update($student, $data);
  }

  public function delete(string $uuid): void
  {
    $student = $this->repository->findByUuid($uuid);

    if (!$student) {
      throw new NotFoundHttpException('Aluno não encontrado.');
    }

    $this->repository->delete($student);
  }

  public function restore(string $uuid): void
  {
    $student = $this->repository->findByUuid($uuid);

    if (!$student) {
      throw new NotFoundHttpException('Aluno não encontrado.');
    }

    $this->repository->restore($student);
  }
}
