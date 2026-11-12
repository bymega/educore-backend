<?php

namespace App\Services;

use App\Models\Guardian;
use App\Models\StudentRegistrationSequence;
use App\Models\User;
use App\Repositories\Interface\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentService
{
    public function __construct(private readonly StudentRepositoryInterface $repository) {}

    public function getAll(array $data)
    {
        return $this->repository->getAll($data);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $guardians = $data['guardians'];

            $user = User::query()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $user->assignRole('aluno');

            unset(
                $data['name'],
                $data['email'],
                $data['password'],
                $data['guardians']
            );

            $data['user_id'] = $user->id;
            $data['registration_number'] = StudentRegistrationSequence::generate();

            $student = $this->repository->create($data);

            foreach ($guardians as $guardianData) {
                $pivotData = [
                    'relationship' => $guardianData['relationship'],
                    'is_primary' => $guardianData['is_primary'],
                ];

                unset($guardianData['relationship'], $guardianData['is_primary']);

                $guardian = Guardian::query()->firstOrCreate(
                    ['cpf' => $guardianData['cpf']],
                    $guardianData
                );

                $student->guardians()->attach($guardian->id, $pivotData);
            }

            return $student->load(['user', 'guardians']);
        });
    }

    public function update(string $uuid, array $data)
    {
        return DB::transaction(function () use ($uuid, $data) {
            $student = $this->repository->findByUuid($uuid);

            if (! $student || $student->trashed()) {
                throw new NotFoundHttpException('Aluno não encontrado');
            }

            $userData = array_intersect_key($data, array_flip(['name', 'email']));
            if (! empty($data['password'])) {
                $userData['password'] = Hash::make($data['password']);
            }

            if ($userData !== []) {
                $student->user()->firstOrFail()->update($userData);
            }

            $studentData = array_intersect_key($data, array_flip([
                'birth_date', 'gender', 'cpf', 'address', 'status',
            ]));

            if ($studentData !== []) {
                $this->repository->update($student, $studentData);
            }

            if (array_key_exists('guardians', $data)) {
                $sync = [];

                foreach ($data['guardians'] as $guardianData) {
                    $pivotData = [
                        'relationship' => $guardianData['relationship'],
                        'is_primary' => $guardianData['is_primary'],
                    ];

                    unset($guardianData['relationship'], $guardianData['is_primary']);

                    $guardian = Guardian::query()->firstOrCreate(
                        ['cpf' => $guardianData['cpf']],
                        $guardianData
                    );

                    $sync[$guardian->id] = $pivotData;
                }

                $student->guardians()->sync($sync);
            }

            return $student->load(['user', 'guardians']);
        });
    }

    public function delete(string $uuid): void
    {
        $student = $this->repository->findByUuid($uuid);

        if (! $student) {
            throw new NotFoundHttpException('Aluno não encontrado.');
        }

        $this->repository->delete($student);
    }

    public function restore(string $uuid): void
    {
        $student = $this->repository->findByUuid($uuid);

        if (! $student) {
            throw new NotFoundHttpException('Aluno não encontrado.');
        }

        $this->repository->restore($student);
    }
}
