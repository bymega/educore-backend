<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Língua Portuguesa',
                'code' => 'LP',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'Matemática',
                'code' => 'MAT',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'Ciências',
                'code' => 'CIE',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'Geografia',
                'code' => 'GEO',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'História',
                'code' => 'HIS',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'Arte',
                'code' => 'ART',
                'workload' => 40,
                'status' => 'active'
            ],
            [
                'name' => 'Educação Física',
                'code' => 'EDF',
                'workload' => 40,
                'status' => 'active'
            ],
            [
                'name' => 'Língua Inglesa',
                'code' => 'ING',
                'workload' => 40,
                'status' => 'active'
            ],
            [
                'name' => 'Ensino Religioso',
                'code' => 'ER',
                'workload' => 40,
                'status' => 'active'
            ],
            [
                'name' => 'Biologia',
                'code' => 'BIO',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'Física',
                'code' => 'FIS',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'Química',
                'code' => 'QUI',
                'workload' => 80,
                'status' => 'active'
            ],
            [
                'name' => 'Filosofia',
                'code' => 'FIL',
                'workload' => 40,
                'status' => 'active'
            ],
            [
                'name' => 'Sociologia',
                'code' => 'SOC',
                'workload' => 40,
                'status' => 'active'
            ],
            [
                'name' => 'Literatura',
                'code' => 'LIT',
                'workload' => 40,
                'status' => 'active'
            ],
            [
                'name' => 'Redação',
                'code' => 'RED',
                'workload' => 40,
                'status' => 'active'
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate(
                ['code' => $subject['code']],
                $subject
            );
        }
    }
}
