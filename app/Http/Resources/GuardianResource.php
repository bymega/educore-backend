<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuardianResource extends JsonResource
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
            'name' => $this->name,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => $this->status,
            'students' => $this->whenLoaded('students', fn() => $this->students->map(fn($student) => [
                'uuid' => $student->uuid,
                'name' => $student->user?->name,
                'registration_number' => $student->registration_number,
                'cpf' => $student->cpf,
                'status' => $student->status,
                'relationship' => $student->pivot->relationship,
                'is_primary' => (bool) $student->pivot->is_primary,
            ])),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
