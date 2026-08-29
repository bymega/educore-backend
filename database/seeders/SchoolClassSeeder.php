<?php

namespace Database\Seeders;

use App\Models\GradeLevel;
use App\Models\SchoolClass;
use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolYear = SchoolYear::query()
            ->where('name', '2026')
            ->firstOrFail();

        $schoolClasses = [
            [
                'grade_level_code' => 'EM01',
                'name' => 'Turma 100',
                'code' => 'TRM100',
                'shift' => 'morning',
                'room' => 'Sala 10',
                'capacity' => 30,
                'status' => 'active',
            ],
            [
                'grade_level_code' => 'EM02',
                'name' => 'Turma 200',
                'code' => 'TRM200',
                'shift' => 'afternoon',
                'room' => 'Sala 20',
                'capacity' => 20,
                'status' => 'active',
            ],
            [
                'grade_level_code' => 'EM03',
                'name' => 'Turma 300',
                'code' => 'TRM300',
                'shift' => 'morning',
                'room' => 'Sala 30',
                'capacity' => 10,
                'status' => 'active',
            ],
        ];

        foreach ($schoolClasses as $schoolClass) {
            $gradeLevel = GradeLevel::query()
                ->where('code', $schoolClass['grade_level_code'])
                ->firstOrFail();

            unset($schoolClass['grade_level_code']);

            SchoolClass::query()->updateOrCreate(
                ['code' => $schoolClass['code']],
                [
                    ...$schoolClass,
                    'school_year_id' => $schoolYear->id,
                    'grade_level_id' => $gradeLevel->id,
                ],
            );
        }
    }
}
