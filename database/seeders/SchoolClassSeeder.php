<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolClasses = [
            [
                'school_year_id' => 1,
                'grade_level_id' => 18,
                'name' => 'Turma 100',
                'code' => 'TRM100',
                'shift' => 'morning',
                'room' => 'Sala 10',
                'capacity' => 30,
                'status' => 'active'
            ],
            [
                'school_year_id' => 1,
                'grade_level_id' => 19,
                'name' => 'Turma 200',
                'code' => 'TRM200',
                'shift' => 'afternoon',
                'room' => 'Sala 20',
                'capacity' => 20,
                'status' => 'active'
            ],
            [
                'school_year_id' => 1,
                'grade_level_id' => 20,
                'name' => 'Turma 300',
                'code' => 'TRM300',
                'shift' => 'morning',
                'room' => 'Sala 30',
                'capacity' => 10,
                'status' => 'active'
            ],

        ];

        foreach ($schoolClasses as $schoolClass) {
            SchoolClass::updateOrCreate(
                ['code' => $schoolClass['code']],
                $schoolClass
            );
        }
    }
}
