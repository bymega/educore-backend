<?php

namespace App\Services;

use App\Repositories\Interface\EnrollmentRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EnrollmentService
{
  public function __construct(private readonly EnrollmentRepositoryInterface $repository) {}

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
    $enrollments = $this->repository->findByUuid($uuid);

    if (!$enrollments) {
      throw new NotFoundHttpException('Matrícula não encontrada');
    }

    $this->repository->update($enrollments, $data);
  }

  public function delete(string $uuid): void
  {
    $enrollments = $this->repository->findByUuid($uuid);

    if (!$enrollments) {
      throw new NotFoundHttpException('Matrícula não encontrada.');
    }

    $this->repository->delete($enrollments);
  }

  public function restore(string $uuid): void
  {
    $enrollments = $this->repository->findByUuid($uuid);

    if (!$enrollments) {
      throw new NotFoundHttpException('Matrícula não encontrada');
    }

    $this->repository->restore($enrollments);
  }
}
