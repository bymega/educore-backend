<?php

namespace App\Services;

use App\Repositories\Interface\AttendanceRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AttendanceService
{
  public function __construct(private readonly AttendanceRepositoryInterface $repository) {}

  public function create(array $data)
  {
    return $this->repository->create($data);
  }

  public function update(string $uuid, array $data)
  {
    $attendances = $this->repository->findByUuid($uuid);

    if (!$attendances) {
      throw new NotFoundHttpException('Frequência não encontrada.');
    }

    return $this->repository->update($attendances, $data);
  }

  public function delete(string $uuid): void
  {
    $attendances = $this->repository->findByUuid($uuid);

    if (!$attendances) {
      throw new NotFoundHttpException('Frequência não encontrada.');
    }

    $this->repository->delete($attendances);
  }

  public function restore(string $uuid): void
  {
    $attendances = $this->repository->findByUuid($uuid);

    if (!$attendances) {
      throw new NotFoundHttpException('Frequência não encontrada.');
    }

    $this->repository->restore($attendances);
  }
}
