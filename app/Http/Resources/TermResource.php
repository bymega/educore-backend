<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TermResource extends JsonResource
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
            'school_year' => $this->whenLoaded('schoolYear', fn() => [
                'uuid' => $this->schoolYear->uuid,
                'name' => $this->schoolYear->name,
                'start_date' => $this->schoolYear->start_date,
                'end_date' => $this->schoolYear->end_date,
                'status' => $this->schoolYear->status,
            ]),
            'name' => $this->name,
            'number' => $this->number,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
