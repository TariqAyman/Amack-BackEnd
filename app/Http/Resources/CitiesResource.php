<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CitiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "image" => "url",
            "rate" => "",
            "dive_sites" => $this->sites->count(),
            "location" => [
                "lat" => $this->latitude,
                "long" => $this->longitude
            ],
            "sites" => NearbySiteResource::collection($this->sites),
        ];
    }
}
