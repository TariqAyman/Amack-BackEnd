<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NearbySiteResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "image" => $this->images->pluck('path'),
            "location" => [
                "lat" => $this->latitude,
                "long" => $this->longitude
            ],
            "max_depth" => $this->max_depth,
            "site_entry" => "Shore",
            "site_type" => $this->mainTaxon->name,
            "visibility" => $this->visibility,
            "rate" => $this->rate,
            "isSpecial" => $this->special
        ];
    }
}
