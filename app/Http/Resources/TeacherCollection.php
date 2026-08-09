<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var class-string<TeacherResource>
     */
    public $collects = TeacherResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (method_exists($this->resource, 'currentPage')) {
            return [
                'current_page' => $this->currentPage(),
                'data' => $this->collection,
                'first_page_url' => $this->url(1),
                'from' => $this->firstItem(),
                'last_page' => $this->lastPage(),
                'last_page_url' => $this->url($this->lastPage()),
                'links' => $this->linkCollection()->toArray(),
                'next_page_url' => $this->nextPageUrl(),
                'path' => $this->path(),
                'per_page' => $this->perPage(),
                'prev_page_url' => $this->previousPageUrl(),
                'to' => $this->lastItem(),
                'total' => $this->total(),
            ];
        }

        return [
            'data' => $this->collection,
        ];
    }
}
