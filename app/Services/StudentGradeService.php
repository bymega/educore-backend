<?php

namespace App\Services;

use App\Repositories\Interface\StudentGradeRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentGradeService
{
  public function __construct(private readonly StudentGradeRepositoryInterface $repository) {}

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
    $studentGrade = $this->repository->findByUuid($uuid);

    if (!$studentGrade) {
      throw new NotFoundHttpException('Nota do aluno não encontrada.');
    }

    return $this->repository->update($studentGrade, $data);
  }

  public function delete(string $uuid)
  {
    $studentGrade = $this->repository->findByUuid($uuid);

    if (!$studentGrade) {
      throw new NotFoundHttpException('Nota do aluno não encontrada.');
    }

    return $this->repository->delete($studentGrade);
  }

  public function restore(string $uuid)
  {
    $studentGrade = $this->repository->findByUuid($uuid);

    if (!$studentGrade) {
      throw new NotFoundHttpException('Nota do aluno não encontrada.');
    }

    return $this->repository->restore($studentGrade);
  }
}
