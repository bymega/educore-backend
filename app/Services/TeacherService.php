<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interface\TeacherRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TeacherService
{
  public function __construct(private readonly TeacherRepositoryInterface $repository) {}

  public function getAll(array $data)
  {
    return $this->repository->getAll($data);
  }

  public function create(array $data)
  {
    return DB::transaction(function () use ($data) {
      $user = User::query()->create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
      ]);

      $user->assignRole('professor');

      unset($data['name'], $data['email'], $data['password']);
      $data['user_id'] = $user->id;

      return $this->repository->create($data)->load('user');
    });
  }

  public function update(string $uuid, array $data)
  {
    return DB::transaction(function () use ($uuid, $data) {
      $teacher = $this->repository->findByUuid($uuid);

      if (!$teacher || $teacher->trashed()) {
        throw new NotFoundHttpException('Professor não encontrado.');
      }

      $userData = array_intersect_key($data, array_flip(['name', 'email']));
      if (!empty($data['password'])) {
        $userData['password'] = Hash::make($data['password']);
      }

      if ($userData !== []) {
        $teacher->user()->firstOrFail()->update($userData);
      }

      $teacherData = array_intersect_key($data, array_flip([
        'registration_number', 'cpf', 'specialization', 'status',
      ]));

      if ($teacherData !== []) {
        $this->repository->update($teacher, $teacherData);
      }

      return $teacher->load('user');
    });
  }

  public function delete(string $uuid): void
  {
    $teacher = $this->repository->findByUuid($uuid);

    if (!$teacher) {
      throw new NotFoundHttpException('Professor não encontrado.');
    }

    $this->repository->delete($teacher);
  }

  public function restore(string $uuid): void
  {
    $teacher = $this->repository->findByUuid($uuid);

    if (!$teacher) {
      throw new NotFoundHttpException('Professor não localizado.');
    }

    $this->repository->restore($teacher);
  }
}
