<?php

namespace App\Services;

use App\Models\Teacher;
use App\Repositories\Interface\TeacherRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TeacherService
{
  public function __construct(private readonly TeacherRepositoryInterface $repository) {}

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
    $teacher = $this->repository->findByUuid($uuid);

    if (!$teacher) {
      throw new NotFoundHttpException('Professor não encontrado.');
    }

    return $this->repository->update($teacher, $data);
  }

  public function delete(string $uuid): void
  {
    $teacher = $this->repository->findByUuid($uuid);

    if (!$teacher) {
      throw  new NotFoundHttpException('Professor não encontrado.');
    }

    $this->repository->delete($teacher);
  }

  public function restore(string $uuid): void
  {
    $teacher = $this->repository->findByUuid($uuid);

    if (!$teacher) {
      throw new NotFoundHttpException('Professor não localizado.');
    }

    $this->repository->restore($teacher);
  }
}
