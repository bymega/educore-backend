<?php

namespace App\Services;

use App\Repositories\Interface\TermRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TermService
{
  public function __construct(private readonly TermRepositoryInterface $repository) {}

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
    $terms = $this->repository->findByUuid($uuid);

    if (!$terms) {
      throw new NotFoundHttpException('Período não encontrado.');
    }

    return $this->repository->update($terms, $data);
  }

  public function delete(string $uuid): void
  {
    $terms = $this->repository->findByUuid($uuid);

    if (!$terms) {
      throw new NotFoundHttpException('Período não encontrado.');
    }

    $this->repository->delete($terms);
  }

  public function restore(string $uuid): void
  {
    $terms = $this->repository->findByUuid($uuid);

    if (!$terms) {
      throw new NotFoundHttpException('Período não encontrado.');
    }

    $this->repository->restore($terms);
  }
}
