<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            "rate" => $this->rate,
            "image" => $this->images->first() ?: 'https://i.pinimg.com/236x/fc/7e/ce/fc7ece8e8ee1f5db97577a4622f33975--photo-icon-sad.jpg',
            //            "images" => collect($this->images)->merge(["https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTItKb-XnJWhU_NkWbaijbwom30tWK11Q6teg&usqp=CAU"]) ,
            "dive_sites" => $this->sites->count(),
            "dive_centers" => 200,
            "peak_seasons" => $this->peak_season->name ?? '',
            "top_place" => "mamsha",
            "about" => $this->description,
            "average_temp" => $this->temp,
            "average_wind" => $this->wind,
            "emergency" => [
                [
                    "id" => 1,
                    "title" => "TOURIMS POLICE",
                    "icon" => asset('center-panel/images/icon-call.png'),
                    "number" => "01117724287",
                    "location" => [
                        "lat" => "30.303",
                        "long" => "28.021"
                    ]
                ]
            ],
            "top_sites" => SiteResource::collection($this->top_sites)
        ];
    }
}
