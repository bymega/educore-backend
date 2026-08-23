<?php

namespace Database\Seeders;

use App\Models\GradeLevel;
use Illuminate\Database\Seeder;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeLevels = [
            [
                'education_level_id' => 1,
                'name' => 'Berçário',
                'code' => 'EI01',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'education_level_id' => 1,
                'name' => 'Maternal I',
                'code' => 'EI02',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'education_level_id' => 1,
                'name' => 'Maternal II',
                'code' => 'EI03',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'education_level_id' => 1,
                'name' => 'Pré I',
                'code' => 'EI04',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'education_level_id' => 1,
                'name' => 'Pré II',
                'code' => 'EI05',
                'sort_order' => 5,
                'status' => 'active',
            ],
            [
                'education_level_id' => 2,
                'name' => '1º ano',
                'code' => 'EF01',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'education_level_id' => 2,
                'name' => '2º ano',
                'code' => 'EF02',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'education_level_id' => 2,
                'name' => '3º ano',
                'code' => 'EF03',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'education_level_id' => 2,
                'name' => '4º ano',
                'code' => 'EF04',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'education_level_id' => 2,
                'name' => '5º ano',
                'code' => 'EF05',
                'sort_order' => 5,
                'status' => 'active',
            ],
            [
                'education_level_id' => 3,
                'name' => '6º ano',
                'code' => 'EF06',
                'sort_order' => 6,
                'status' => 'active',
            ],
            [
                'education_level_id' => 3,
                'name' => '7º ano',
                'code' => 'EF07',
                'sort_order' => 7,
                'status' => 'active',
            ],
            [
                'education_level_id' => 3,
                'name' => '8º ano',
                'code' => 'EF08',
                'sort_order' => 8,
                'status' => 'active',
            ],
            [
                'education_level_id' => 3,
                'name' => '9º ano',
                'code' => 'EF09',
                'sort_order' => 9,
                'status' => 'active',
            ],
            [
                'education_level_id' => 4,
                'name' => '1º ano',
                'code' => 'EM01',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'education_level_id' => 4,
                'name' => '2º ano',
                'code' => 'EM02',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'education_level_id' => 4,
                'name' => '3º ano',
                'code' => 'EM03',
                'sort_order' => 3,
                'status' => 'active',
            ],
        ];

        foreach ($gradeLevels as $gradeLevel) {
            GradeLevel::updateOrCreate(
                ['code' => $gradeLevel['code']],
                $gradeLevel,
            );
        }
    }
}
