<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory()
            ->count(20)
            ->create()
            ->each(fn (Student $student) => $student->user->assignRole('aluno'));
    }
}
