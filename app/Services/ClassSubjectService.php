<?php

namespace App\Services;

use App\Repositories\Interface\ClassSubjectRepositoryInterface;
use App\Repositories\Interface\SchoolClassRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClassSubjectService
{
  public function __construct(
    private readonly ClassSubjectRepositoryInterface $repository,
    private readonly SchoolClassRepositoryInterface $schoolClassRepository
  ) {}

  public function getAll(string $classUuid, array $data)
  {
    return $this->repository->getAll($classUuid, $data);
  }

  public function assign(string $classUuid, array $data): void
  {
    $schoolClass = $this->schoolClassRepository->findByUuid($classUuid);

    if (!$schoolClass || $schoolClass->trashed()) {
      throw new NotFoundHttpException('Turma não encontrada');
    }

    DB::transaction(function () use ($schoolClass, $data) {
      foreach ($data['subjects'] as $subject) {
        $this->repository->assign([
          ...$subject,
          'school_class_id' => $schoolClass->id,
        ]);
      }
    });
  }

  public function update(string $classUuid, string $uuid, array $data): void
  {
    $classSubject = $this->repository->findByUuidAndClassUuid($uuid, $classUuid);

    if (!$classSubject) {
      throw new NotFoundHttpException('Disciplina da turma não encontrada');
    }

    $this->repository->update($classSubject, $data);
  }

  public function delete(string $classUuid, string $uuid): void
  {
    $classSubject = $this->repository->findByUuidAndClassUuid($uuid, $classUuid);

    if (!$classSubject || $classSubject->trashed()) {
      throw new NotFoundHttpException('Disciplina da turma não encontrada');
    }

    $this->repository->delete($classSubject);
  }

  public function restore(string $classUuid, string $uuid): void
  {
    $classSubject = $this->repository->findByUuidAndClassUuid($uuid, $classUuid);

    if (!$classSubject) {
      throw new NotFoundHttpException('Disciplina da turma não encontrada');
    }

    $this->repository->restore($classSubject);
  }
}
