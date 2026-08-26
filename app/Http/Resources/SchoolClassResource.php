<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'school_years' => $this->whenLoaded('schoolYear', fn() => [
                'uuid' => $this->schoolYear->uuid,
                'name' => $this->schoolYear->name,
                'start_date' => $this->schoolYear->start_date,
                'end_date' => $this->schoolYear->end_date,
                'status' => $this->schoolYear->status,
            ]),
            'grade_levels' => $this->whenLoaded('gradeLevel', fn() => [
                'uuid' => $this->gradeLevel->uuid,
                'education_level' => $this->gradeLevel->relationLoaded('educationLevel')
                    ? [
                        'uuid' => $this->gradeLevel->educationLevel->uuid,
                        'name' => $this->gradeLevel->educationLevel->name,
                    ]
                    : null,
            ]),
            'name' => $this->name,
            'code' => $this->code,
            'shift' => $this->shift,
            'room' => $this->room,
            'capacity' => $this->capacity,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
