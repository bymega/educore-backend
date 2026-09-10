<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'class_lesson' => ClassLessonResource::make($this->whenLoaded('classLesson')),
            'enrollment' => EnrollmentResource::make($this->whenLoaded('enrollment')),
            'status' => $this->status
        ];
    }
}
