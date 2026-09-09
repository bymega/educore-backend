<?php

namespace App\Services;

use App\Repositories\Interface\ClassLessonRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClassLessonService
{
  public function __construct(private readonly ClassLessonRepositoryInterface $repository) {}

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
    $classLessons = $this->repository->findByUuid($uuid);

    if (!$classLessons) {
      throw new NotFoundHttpException('Aula da turma não encontrada.');
    }

    return $this->repository->update($classLessons, $data);
  }

  public function delete(string $uuid): void
  {
    $classLessons = $this->repository->findByUuid($uuid);

    if (!$classLessons) {
      throw new NotFoundHttpException('Aula da turma não encontrada.');
    }

    $this->repository->delete($classLessons);
  }

  public function restore(string $uuid): void
  {
    $classLessons = $this->repository->findByUuid($uuid);

    if (!$classLessons) {
      throw new NotFoundHttpException('Aula da turma não encontrada.');
    }

    $this->repository->restore($classLessons);
  }
}
