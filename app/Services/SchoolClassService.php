<?php

namespace App\Services;

use App\Repositories\Interface\SchoolClassRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SchoolClassService
{
  public function __construct(private readonly SchoolClassRepositoryInterface $repository) {}

  public function create(array $data)
  {
    return $this->repository->create($data);
  }

  public function update(string $uuid, array $data)
  {
    $schoolClasses = $this->repository->findByUuid($uuid);

    if (!$schoolClasses) {
      throw new NotFoundHttpException('Turma não encontrada');
    }

    return $this->repository->update($schoolClasses, $data);
  }
}
