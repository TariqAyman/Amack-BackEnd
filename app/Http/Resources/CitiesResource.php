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
            "id" => $this->id,
            "name" => $this->name,
            "images" => collect($this->images)->merge(["https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTItKb-XnJWhU_NkWbaijbwom30tWK11Q6teg&usqp=CAU"]) ,
            "rate" => 3.5,
            "dive_sites" => $this->sites->count(),
            "location" => [
                "lat" => $this->latitude,
                "long" => $this->longitude
            ],
            "sites" => NearbySiteResource::collection($this->sites),
        ];
    }
}
