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
            "images" => collect($this->images)->merge(["https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTItKb-XnJWhU_NkWbaijbwom30tWK11Q6teg&usqp=CAU"]) ,
            "rate" => $this->rate,
            "dive_sites" => $this->sites->count(),
            "dive_centers" => 200,
            "peak_seasons" => "summer",
            "top_place" => "mamsha",
            "description" => $this->description,
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
