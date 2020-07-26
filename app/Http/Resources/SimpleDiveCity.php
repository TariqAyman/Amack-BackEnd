<?php

declare(strict_types=1);

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class SimpleDiveCity extends JsonResource
{
    public function toArray($request): array
    {

        return [
            'id' => $this->diveCity->id,
            'name' => $this->name,
            'type' => 'diveCity'
        ];
    }
}