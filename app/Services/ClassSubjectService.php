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
}
