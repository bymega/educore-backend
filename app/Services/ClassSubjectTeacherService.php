<?php

namespace App\Services;

use App\Repositories\Interface\ClassSubjectRepositoryInterface;
use App\Repositories\Interface\ClassSubjectTeacherRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClassSubjectTeacherService
{
  public function __construct(private readonly ClassSubjectTeacherRepositoryInterface $repository, private readonly ClassSubjectRepositoryInterface $classSubject) {}

  public function getAll(string $classUuid, array $data)
  {
    return $this->repository->getAll($classUuid, $data);
  }

  public function assign(string $classUuid, array $data): void
  {
    $classSubject = $this->classSubject->findByUuid($classUuid);

    if (!$classSubject || $classSubject->trashed()) {
      throw new NotFoundHttpException(
        'Disciplina ofertada não encontrada'
      );
    }

    DB::transaction(function () use ($classSubject, $data) {
      foreach ($data['teachers'] as $teacher) {
        $this->repository->assign([
          ...$teacher,
          'class_subject_id' => $classSubject->id,
        ]);
      }
    });
  }

  public function update(string $classuuid, string $uuid, array $data): void
  {
    $subjectTeachers = $this->repository->findByUuidAndClassUuid($uuid, $classuuid);

    if (!$subjectTeachers) {
      throw new NotFoundHttpException('Disciplina ofertada não encontrada');
    }

    $this->repository->update($subjectTeachers, $data);
  }

  public function delete(string $classUuid, string $uuid): void
  {
    $subjectTeachers = $this->repository->findByUuidAndClassUuid($uuid, $classUuid);

    if (!$subjectTeachers || $subjectTeachers->trashed()) {
      throw new NotFoundHttpException('Disciplina ofertada não encontrada');
    }

    $this->repository->delete($subjectTeachers);
  }

  public function restore(string $classUuid, string $uuid): void
  {
    $subjectTeachers = $this->repository->findByUuidAndClassUuid($uuid, $classUuid);

    if (!$subjectTeachers) {
      throw new NotFoundHttpException('Disciplina ofertada não encontrada');
    }

    $this->repository->restore($subjectTeachers);
  }
}
