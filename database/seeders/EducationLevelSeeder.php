<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educationLevels = [
            [
                'name' => 'Educação Infantil',
                'code' => 'EI',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'name' => 'Ensino Fundamental — Anos Iniciais',
                'code' => 'EF-AI',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Ensino Fundamental — Anos Finais',
                'code' => 'EF-AF',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'name' => 'Ensino Médio',
                'code' => 'EM',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'name' => 'Educação de Jovens e Adultos',
                'code' => 'EJA',
                'sort_order' => 5,
                'status' => 'active',
            ],
            [
                "name" => "Ensino Técnico",
                "code" => "ET",
                "sort_order" => 6,
                "status" => "active"
            ],
            [
                "name" => "Ensino Superior",
                "code" => "ES",
                "sort_order" => 7,
                "status" => "active"
            ]
        ];

        foreach ($educationLevels as $educationLevel) {
            EducationLevel::updateOrCreate(
                ['code' => $educationLevel['code']],
                $educationLevel,
            );
        }
    }
}
