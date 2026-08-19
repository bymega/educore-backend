<?php

namespace App\Services;

use App\Repositories\Interface\SchoolYearRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SchoolYearService
{
  public function __construct(private readonly SchoolYearRepositoryInterface $repository) {}

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
    $schoolYear = $this->repository->findByUuid($uuid);

    if (!$schoolYear) {
      throw new NotFoundHttpException('Ano Letivo inválido');
    }

    return $this->repository->update($schoolYear, $data);
  }

  public function delete(string $uuid): void
  {
    $schoolYear = $this->repository->findByUuid($uuid);

    if (!$schoolYear) {
      throw new NotFoundHttpException('Ano Letivo inválido');
    }

    $this->repository->delete($schoolYear);
  }

  public function restore(string $uuid): void
  {
    $schoolYear = $this->repository->findByUuid($uuid);

    if (!$schoolYear) {
      throw new NotFoundHttpException('Ano Letivo inválido');
    }

    $this->repository->restore($schoolYear);
  }
}
