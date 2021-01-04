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
            "image" => $this->images->first()->image ?? 'https://i.pinimg.com/236x/fc/7e/ce/fc7ece8e8ee1f5db97577a4622f33975--photo-icon-sad.jpg',
//            "images" => collect($this->images)->merge(["https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTItKb-XnJWhU_NkWbaijbwom30tWK11Q6teg&usqp=CAU"]),
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
