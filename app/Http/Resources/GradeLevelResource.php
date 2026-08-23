<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeLevelResource extends JsonResource
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
            'education_level' => $this->whenLoaded('educationLevel', fn() => [
                'uuid' => $this->educationLevel->uuid,
                'name' => $this->educationLevel->name,
                'code' => $this->educationLevel->code,
                'sort_order' => $this->educationLevel->sort_order,
                'status' => $this->educationLevel->status,
            ]),
            'name' => $this->name,
            'code' => $this->code,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
