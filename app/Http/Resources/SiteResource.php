<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
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
            "images" => $this->images->pluck('path'),
            "active_info" => [
                "visited_by" => "3 Center",
                "next_trip_in" => "14 days"
            ],
            "description" => $this->description,
            "trip_info" => [
                "site_type" => $this->mainTaxon->name,
                "dive_entry" => $this->entries->pluck('name'),
                "max_depth" => $this->max_depth,
                "current" => $this->current,
                "visibility" => $this->visibility,
                "required_license" => $this->license->name,
                "time_of_day" => DayTime::collection($this->dayTimes),
                "activities" => DiveActivity::collection($this->activities),
                "when_to_visit" => $this->seasons->pluck('name'),
            ],
            "site_features" => Taxon::collection($this->subTaxons),
            "recommended_equipment" => EquipmentResource::collection($this->equipments),
            "near_sites" => NearbySiteResource::collection($this->nearbySites),
            "isSpecial" => $this->special,
            "isAvailable" => $this->enabled,
        ];
    }
}
