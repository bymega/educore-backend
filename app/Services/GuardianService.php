<?php

namespace App\Services;

use App\Models\Guardian;
use App\Repositories\Interface\GuardianRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GuardianService
{
  public function __construct(private readonly GuardianRepositoryInterface $repository) {}

  public function getAll(array $data)
  {
    return $this->repository->getAll($data);
  }

  public function update(string $uuid, array $data)
  {
    $guardian = $this->repository->findByUuid($uuid);

    if (!$guardian) {
      throw new NotFoundHttpException('Responsável não encontrado.');
    }

    return $this->repository->update($guardian, $data);
  }

  public function delete(string $uuid): void
  {
    $guardian = $this->repository->findByUuid($uuid);

    if (!$guardian) {
      throw new NotFoundHttpException('Responsável não encontrado.');
    }

    $this->repository->delete($guardian);
  }

  public function restore(string $uuid): void
  {
    $guardian = $this->repository->findByUuid($uuid);

    if (!$guardian) {
      throw new NotFoundHttpException('Responsável não encontrado.');
    }

    $this->repository->restore($guardian);
  }
}
