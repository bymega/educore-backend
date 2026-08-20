<?php

namespace App\Services;

use App\Repositories\Interface\TermRepositoryInterface;

class TermService
{
  public function __construct(private readonly TermRepositoryInterface $repository) {}

  public function create(array $data)
  {
    return $this->repository->create($data);
  }
}
