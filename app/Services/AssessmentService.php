<?php

namespace App\Services;

use App\Repositories\Interface\AssessmentRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AssessmentService
{
  public function __construct(private readonly AssessmentRepositoryInterface $repository) {}

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
    $assessments = $this->repository->findByUuid($uuid);

    if (!$assessments) {
      throw new NotFoundHttpException('Avaliação não encontrada.');
    }

    return $this->repository->update($assessments, $data);
  }

  public function delete(string $uuid): void
  {
    $assessments = $this->repository->findByUuid($uuid);

    if (!$assessments) {
      throw new NotFoundHttpException('Avaliação não encontrada.');
    }

    $this->repository->delete($assessments);
  }

  public function restore(string $uuid): void
  {
    $assessments = $this->repository->findByUuid($uuid);

    if (!$assessments) {
      throw new NotFoundHttpException('Avaliação não encontrada.');
    }

    $this->repository->restore($assessments);
  }
}
