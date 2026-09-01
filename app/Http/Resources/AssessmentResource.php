<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssessmentResource extends JsonResource
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
            'class_subject' => ClassSubjectResource::make($this->whenLoaded('classSubject')),
            'term' => TermResource::make($this->whenLoaded('term')),
            'name' => $this->name,
            'assessment_date' => $this->assessment_date,
            'maximum_score' => $this->maximum_score,
            'weight' => $this->weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
