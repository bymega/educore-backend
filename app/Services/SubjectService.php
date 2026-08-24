<?php

namespace App\Services;

use App\Repositories\Interface\SubjectRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubjectService
{

  public function __construct(private readonly SubjectRepositoryInterface $repository) {}

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
    $subjects = $this->repository->findByUuid($uuid);

    if (!$subjects) {
      throw new NotFoundHttpException('Disciplina não encontrada');
    }

    return $this->repository->update($subjects, $data);
  }
}
