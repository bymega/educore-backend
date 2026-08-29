<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            GuardianSeeder::class,
            EducationLevelSeeder::class,
            GradeLevelSeeder::class,
            SchoolYearSeeder::class,
            TermSeeder::class,
            SubjectSeeder::class,
            SchoolClassSeeder::class,
        ]);
    }
}
