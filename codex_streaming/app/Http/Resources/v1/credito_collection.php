<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class credito_collection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->map_collection();
    }

    protected function map_collection()
    {
        $mappedCollection = [];

        foreach ($this->collection as $item) {
            $mappedCollection[] = new credito_resource($item);
        }

        return $mappedCollection;
    }
}
