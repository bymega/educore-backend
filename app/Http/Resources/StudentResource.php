<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'registration_number' => $this->registration_number,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'cpf' => $this->cpf,
            'address' => $this->address,
            'status' => $this->status,
            'user' => $this->whenLoaded('user', fn () => [
                'uuid' => $this->user->uuid,
                'name' => $this->user->name,
                'email' => $this->user->email,
                'phone' => $this->user->phone,
            ]),
            'guardians' => $this->whenLoaded('guardians', fn () => $this->guardians->map(fn ($guardian) => [
                'uuid' => $guardian->uuid,
                'name' => $guardian->name,
                'cpf' => $guardian->cpf,
                'phone' => $guardian->phone,
                'email' => $guardian->email,
                'status' => $guardian->status,
                'relationship' => $guardian->pivot->relationship,
                'is_primary' => (bool) $guardian->pivot->is_primary,
            ])),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
